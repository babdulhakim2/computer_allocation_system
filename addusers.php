<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							User Added Successfully. <a href="users.php">View details</a>
					
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
						Username or Phone Number Already Exist
					
								</div>';

$match='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Password Dosnt match 
					
								</div>';


?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-user home-icon"></i>
								<a href="users.php">Users Detail</a>
								<li class="active">Add User</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Add Users
								
							</h1>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
						<?php
if ($_POST['submit']){
	
	$username= $_POST['username'];
	$pswd= $_POST['pswd'];
	$cpswd= $_POST['cpswd'];
	$usertype= $_POST['usertype'];
	$phone= $_POST['phone'];
	$email= $_POST['email'];
	$movie= $_POST['movie'];
	

	include_once('connect.php');
	if ($username==NULL || $pswd==NULL|| $cpswd==NULL || $email==NULL|| $movie==NULL){
		echo $empty;
	} elseif ($pswd!==$cpswd) {
		echo $match ;
	} else{
		$pswd= md5($pswd);
		$stmt= "SELECT * FROM users WHERE username='$username' || phone_no='$phone'";
		$q = mysqli_query($con, $stmt);
		$row= mysqli_num_rows($q);
		if($row>=1){
			echo $duplicate;
		} else{
			$stm= "INSERT INTO users (username, password, usertype, phone_no, email, active, answer) VALUES ('$username','$pswd','$usertype','$phone','$email',0,'$movie')";
			$qq = mysqli_query($con, $stm);
			if($qq==TRUE){
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
								<form action="" method="post" role="">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<thead>
												<td>&nbsp; </td> <td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											
											<div class="form-group">
												<td>
													<label><b>Userame:</b></label>
												</td>
												<td>
													<input name="username" class="form-control" placeholder="Userame" style="width:200px">
												</td>
											</div>
											
											
										</tr>
										<tr>
											</div>
												<div class="form-group">
												<td>
													<label><b>Password:</b></label>
												</td>
												<td>
													<input type="password" name="pswd" class="form-control" placeholder="Password" style="width:200px">
												</td>
											</div>
											
										
										<tr>
											
											</div>
												<div class="form-group">
												<td>
													<label><b>Confirm Password:</b></label>
												</td>
												<td>
													<input type="password" name="cpswd" class="form-control" placeholder="Repeat Password" style="width:200px">
												</td>
											</div>
											
											
											
											
										</tr>
										<tr>
											
											</div>
												<div class="form-group">
												<td>
													<label><b>Email:</b></label>
												</td>
												<td>
													<input type="email" name="email" class="form-control" placeholder="Enter Email" style="width:200px">
												</td>
											</div>
										
										</tr>

										<tr>
											
											<div class="form-group">
												<div class="form-group">
												<td>
													<label><b>Phone Number :</b></label>
												</td>
												<td>
													<?php

include_once('connect.php');
$stm= "SELECT * FROM staff";
$q= mysqli_query($con, $stm);

echo '<select name="phone"  style="width:200px">';
while ($row= mysqli_fetch_assoc($q)){
	echo '<option>'.$row['phone_no'].'</option>';
	
}
echo '</select>';
	?>
												</td>
											</div>
											
										</tr>
																				<tr>
											
											</div>
												<div class="form-group">
												<td>
													<label><b>User Type:</b></label>
												</td>
												<td>
													<select name="usertype" class="form-control" style="width:200px">
														<option>Admin</option>
														<option>Regular</option>
													</select>
												</td>
											</div>
											
											
											
											
										</tr>
										<tr>
											
											</div>
												<div class="form-group">
												<td>
													<label><b>Security Question:</b></label>
												</td>
												<td>
													<input name="movie" class="form-control" placeholder="What is your Favorite Movie" style="width:200px">
												</td>
											</div>
											
											
											
											
										</tr>
										<tr>
											<div class="hidden" >
												<td></td>
											</div>
											<div class="form-group">
												<td>
													<input name="submit" type="submit" class="btn btn-success" value="Add User">
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