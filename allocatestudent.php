<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							Allocation Added Successfully
					
								</div>';
$empty='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Fields Cannot be Empty.
					
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
					Student Already Allocated
					
								</div>';



?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-group home-icon"></i>
								<a href="veiwallocations.php">Allocation Details</a>
								<li class="active">Add Allocation</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Allocation Details
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Add Allocation
								</small>
							</h1>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
						<?php
if ($_POST['submit']){
	
	$admission_no= trim($_POST['admission_no']);
	$computer_no=  trim($_POST['computer']);
	$_SESSION['username']= $username;
	
	if($admission_no==NULL || $computer_no==NULL){
		echo $empty;
	} else{
		include_once('connect.php');
		$stmf= "SELECT admission_no, computer_no FROM students WHERE admission_no='$admission_no'";
		$qf = mysqli_query($con, $stmf);
		while($row1= mysqli_fetch_assoc($qf)){
			$compute= $row1['computer_no'];
			if ($compute== NULL){
				$stm= "SELECT * FROM students WHERE admission_no='$admission_no' ";
				$q = mysqli_query($con, $stm);
				while ($row= mysqli_fetch_assoc($q)){
					$fname= $row['first_name'];
					$lname= $row['last_name'];
					$oname= $row['other_name'];
					$stmt= "INSERT INTO allocation (first_name, last_name, other_name, alloc_id, date_entered, user_type, username, computer_no)
					VALUES('$fname','$lname','$oname','$admission_no', NOW() ,'Student','$username','$computer_no')";
					$qq= mysqli_query($con, $stmt);
					if($qq==TRUE){
						$stmt2= "UPDATE students SET computer_no= '$computer_no' WHERE admission_no='$admission_no'";
						$query = mysqli_query($con, $stmt2);
						$stmt3= "UPDATE computer SET status= 'allocated' WHERE computer_no='$computer_no'";
						$queryf = mysqli_query($con, $stmt3);
						echo $success;
					} else{
						echo $unable;
					}
				}
			}else{
				echo $duplicate;
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
								<form action="" method="post" role="" class="form-responsive">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<thead>
												<td>&nbsp; </td> <td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											
											<div class="form-group">
												<td>
													<label><b> Student Admission Number :</b></label>
												</td>
												<td>
													<?php

include_once('connect.php');
$stm= "SELECT * FROM students";
$q= mysqli_query($con, $stm);

echo '<select name="admission_no" style="width:200px">';
while ($row= mysqli_fetch_assoc($q)){
	echo '<option>'.$row['admission_no'].'</option>';
	
}
echo '</select>';
	?>
												</td>
											</div>
											</div>
												<div class="form-group">
												<td>
													<label><b>Computer Number:</b></label>
												</td>
												<td>
													<?php

include_once('connect.php');
$stm= "SELECT * FROM computer WHERE status ='returned'";
$q= mysqli_query($con, $stm);

echo '<select name="computer" style="width:200px">';
while ($row= mysqli_fetch_assoc($q)){
	echo '<option>'.$row['computer_no'].'</option>';
	
}
echo '</select>';
	?>
												</td>
											</div>
											
											
										</tr>
										<tr>
											
											
										</tr>
										
										<tr>
											<div class="hidden">
												<td>
													
												</td>
											</div>
											<div class="hidden">
												<td>
													
												</td>
											</div>
											<div class="form-group">
												<td>
													<input name="submit" type="submit" class="btn btn-lg btn-success" value="Add Allocation">
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