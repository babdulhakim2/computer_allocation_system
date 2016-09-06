<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('tablehead.html');

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							Allocation Details Revoked Successfully
					
								</div>';
$unable='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to Revoke Data 
					
								</div>';
$duplicate='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Student Has no Allocation
					
								</div>';
	
?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-desktop home-icon"></i>
								<a href="computerdetails.php">Revoke allocation</a>
								<li class="active">Revoke Staff Computer</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Status Details
								
							</h1>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
						
					</div>
				</div>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-md-6 col-xs-offset-3">
<?php

if(isset($_POST['revoke'])){

	include_once('connect.php');
	$admission_no= $_POST['admnor'];
	$computer_no= $_POST['computer_nor'];
	$_SESSION['username']= $username;

	$stmt="SELECT * FROM students WHERE admission_no='$admission_no'";
	$q=mysqli_query($con, $stmt);
	while ($row=mysqli_fetch_assoc($q)) {
		$compt= $row['computer_no'];
		if ($compt!=NULL){
			$stm2="SELECT * FROM students WHERE admission_no='$admission_no'";
			$q2= mysqli_query($con, $stm2);
			while ($row2=mysqli_fetch_assoc($q2)) {
				$fname= $row['first_name'];
				$lname= $row['last_name'];
				$oname= $row['other_name'];
				$stm3= "INSERT INTO revoking (first_name, last_name, other_name, alloc_id, date_entered, user_type, username, computer_no)
						VALUES ('$fname','$lname','$oname','$admission_no', NOW() ,'Student','$username','$computer_no')";
				$query= mysqli_query($con, $stm3);
				if ($query==TRUE){
					$stmt2= "UPDATE students SET computer_no= '' WHERE admission_no='$admission_no'";
					$query = mysqli_query($con, $stmt2);
					$stmt3= "UPDATE computer SET status= 'returned' WHERE computer_no='$computer_no'";
					$queryf = mysqli_query($con, $stmt3);
					echo $success;
				} else {
					echo $unable;
				}
			}

		}else{
			echo $duplicate;
		}
	}
}

?>

							
							</div>
							
						</div>
					<!-- PAGE CONTENT ENDS-->
				</div>
			</div>
		</div>
		
<?php include_once('footer.php');?>