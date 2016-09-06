<?php 
error_reporting(E_ERROR);


$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							User Details Added Successfully. <a href="login.php">Back to login</a>
					
								</div>';
$unable='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to Add User. <a href="login.php">Back to login</a>
					
								</div>';
$duplicate='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Username or Email Already Exist. <a href="login.php">Back to login</a>
								</div>';
$match='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Password Does not match. <a href="login.php">Back to login</a>
								</div>';
$empty='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					All Fiels are Required. <a href="login.php">Back to login</a>
								</div>';



	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Computer Allocation System </title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<!-- Scripts -->
		
		
	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-desktop green"></i>
									<span class="red">Computer Allocation System</span>
									<span class="white" id="id-text2">Login</span>
								</h1>
								<h4 class="light-blue" id="id-company-text">&copy; Dialogue Computer Institute</h4>
							</div>

							<div class="space-6"></div>

<?php
$msg='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					User Does not Exist. <a href="login.php">Back to login</a>
								</div>';
if(isset($_POST['submit'])){
	include_once('connect.php');
	$username= $_POST['rusername'];
	$stm="SELECT * FROM users WHERE username='$username'";
	$query= mysqli_query($con, $stm);
	$count= mysqli_num_rows($query);
	if($count>0){
		header("location:changepassword.php");


	} else {
		echo $msg;
	}
}					

?>


						

							

								

								<div class=" widget-box no-border">
								
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		
		<!-- inline scripts related to this page -->
		
		
	</body>
</html>
