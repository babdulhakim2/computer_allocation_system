<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							Staff Added Successfully. <a href="staffdetails.php">View Details</a>
					
								</div>';
$empty='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						All fields are required
					
								</div>';
$unable='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to Enter Data
					
								</div>';
$duplicate='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Staff Number Already Exist
					
								</div>';
$imageerror='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Please select an image.
					
								</div>';
function saveimage($phone, $name, $image)
{
	$con= mysqli_connect("localhost","root","","dialogue_compt_alloc");
	$query = "insert into staff_image (phone_no, name, image) values ('$phone','$name','$image')";
	$result = mysqli_query($con,$query);
	
}


?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-group home-icon"></i>
								<a href="staffdetails.php">Staff Details</a>
								<li class="active">Add Staff</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Staff Details
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Add Staff
								</small>
							</h1>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
						<?php
if ($_POST['submit']){
	
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$oname= $_POST['oname'];
	$address= $_POST['address'];
	$city= $_POST['city'];
	$state= $_POST['state'];
	$country= $_POST['country'];
	$phone= $_POST['phone'];
	$position = $_POST['position']; 
	$gender = $_POST['gender']; 
	$qualification = $_POST['qualification']; 
	$proficiency = $_POST['proficiency']; 
	
	


	if ($fname==NULL || $lname==NULL|| $oname==NULL  || $address==NULL || $city==NULL || $state==NULL || $phone==NULL || $qualification==NULL || $proficiency==NULL|| $state=='--Select State--' || $country=='--Select Country--'){
		echo $empty; 
	} elseif (getimagesize($_FILES['image']['tmp_name'])==FALSE){
		echo $imageerror;
	} else{
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image= file_get_contents($image);
		$image= base64_encode($image);

		include_once('connect.php');
		$st= "SELECT * FROM staff WHERE phone_no='$phone'";
		$q= mysqli_query($con, $st);
		$row= mysqli_num_rows($q);
		if ($row>=1){
			echo $duplicate;
		} else{
			$q1="INSERT INTO staff (first_name, last_name, other_name, address, city, state, country, phone_no, date_entered, position, gender, qualification, proficiency) 
				VALUES('$fname','$lname','$oname','$address','$city', '$state','$country','$phone', NOW(), '$position', '$gender', '$qualification','$proficiency')";
			$stm1= mysqli_query($con, $q1);
			saveimage($phone, $name, $image);
			if($stm1==TRUE){
				echo $success;
			} else{
				echo $unable;
			}
		}
	}
}
	
?>			
					</div>
				</div>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-md-6 col-xs-offset-1">
								<form action="" method="post" role=""  enctype="multipart/form-data">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<thead>
												<td>&nbsp; </td> <td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											
											<div class="form-group">
												<td>
													<label><b>First Name:</b></label>
												</td>
												<td>
													<input name="fname" class="form-control" placeholder="First Name" style="width:200px">
												</td>
											</div>
											</div>
												<div class="form-group">
												<td>
													<label><b>Last Name:</b></label>
												</td>
												<td>
													<input name="lname" class="form-control" placeholder="Last Name" style="width:200px">
												</td>
											</div>
											
											
											
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Other Name:</b></label>
												</td>
												<td>
													<input name="oname" class="form-control" placeholder="Other Name" style="width:200px">
												</td>
											</div>
											<div class="form-group">
												<td>
													<label><b>Address :</b></label>
												</td>
												<td>
													<input name="address" class="form-control" placeholder="Address" style="width:200px">
												</td>
											</div>
											
										</tr>
										<tr>
											
											<div class="form-group">
												<div class="form-group">
												<td>
													<label><b>City :</b></label>
												</td>
												<td>
													<input name="city" class="form-control" placeholder="City" style="width:200px">
												</td>
											</div>
											
											
												<td>
													<label><b>State :</b></label>
												</td>
												<td>
													<select name="state" class="form-control"  style="width:200px">
														<option>--Select State--</option>
														<option>Abia</option>
														<option>Adamawa</option>
														<option>Akwa Ibom</option>
														<option>Anambara</option>
														<option>Bauchi</option>
														<option>Bayesla</option>
														<option>Benue</option>
														<option>Borno</option>
														<option>Cross River</option>
														<option>Delta</option>
														<option>Edo</option>
														<option>Enugu</option>
														<option>FCT Abuja</option>
														<option>Gombe</option>
														<option>Jigawa</option>
														<option>Kano</option>
														<option>Kaduna</option>
														<option>Katsina</option>
														<option>Kebbi</option>
														<option>Kwara</option>
														<option>Lagos</option>
														<option>Niger</option>
														<option>Ogun</option>
														<option>Ondo</option>
														<option>Osun</option>
														<option>Rivers</option>
														<option>Sokoto</option>
														<option>Taraba</option>
														<option>Uyo</option>
														<option>Yobe</option>
														<option>Zamfara</option>
													</select>
												</td>
											</div>
											
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Country :</b></label>
												</td>
												<td>
													<select name="country" class="form-control"  style="width:200px">
														<option>--Select Country--</option>
														<option>Australia</option>
														<option>Austria</option>
														<option>Bangladesh</option>
														<option>Belgium</option>
														<option>Brazil</option>
														<option>Canada</option>
														<option>China</option>
														<option>Denmark</option>
														<option>France</option>
														<option>Germany</option>
														<option>Hong kong</option>
														<option>Ireland</option>
														<option>Italy</option>
														<option>Niger</option>
														<option>Nigeria</option>
														<option>Pakistan</option>
														<option>Qatar</option>
														<option>Russia</option>
														<option>Spain</option>
														<option>Taiwan</option>
														<option>UAE</option>
														<option>United Kingdom</option>
														<option>United States</option>
														<option>Veitnam</option>
													</select>
												</td>
											</div>
											
											<div class="form-group">
												<div class="form-group">
												<td>
													<label><b>Phone Number :</b></label>
												</td>
												<td>
													<input name="phone" class="form-control" placeholder="--- --- --- ---" style="width:200px">
												</td>
											</div>
											
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Position/Rank :</b></label>
												</td>
												<td>
													<input name="position" class="form-control" placeholder="Enter staff rank" style="width:200px">
												</td>
											</div>
											
											<div class="form-group">
												<td>
													<label><b>Gender :</b></label>
												</td>
												<td>
													<select name="gender" class="form-control"  style="width:200px">
														<option>Male</option>
														<option>Female</option>
													</select>
												</td>
											</div>
											
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Qualification:</b></label>
												</td>
												<td>
													<input name="qualification" class="form-control" placeholder="Enter staff Qualification" style="width:200px">
												</td>
											</div>

											<div class="form-group">
												<td>
													<label><b>Proficiency:</b></label>
												</td>
												<td>
													<input name="proficiency" class="form-control" placeholder="Enter staff Proficiency" style="width:200px">
												</td>
											</div>
											
										</tr>
										<tr>

											<div class="form-group">
												<td>
													<label><b>Image:</b></label>
												</td>
												<td>
													<input type="file" name="image" style="width:200px">
												</td>
											</div>
										
											
											<div class="hidden" >
												<td></td>
											</div>
											
										</tr>
										<tr>
											<div class="hidden" >
												<td></td>
											</div>
											<div class="form-group">
												<td>
													<input name="submit" type="submit" class="btn btn-success" value="Add Staff">
												</td>
											</div>
											<div class="form-group">
												<td>
													<input name="reset" type="reset" class="btn btn-danger btn-lg" value="Reset">
												</td>
											</div>
										</tr>

									</table>
								</form>

							
							</div>
							
						</div>
					<!-- PAGE CONTENT ENDS-->
				</div>
			</div>
		</div>
		
<?php include_once('footer.php');?>