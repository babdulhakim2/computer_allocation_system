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

if(isset($_POST['register'])){
	$email= $_POST['email'];
	$username= $_POST['username'];
	$password= $_POST['password'];
	$cpassword= $_POST['cpassword'];
	$phone= $_POST['phone'];
	$movie= $_POST['movie'];
	include_once('connect.php');
	if($email==NULL|| $username==NULL|| $password==NULL|| $cpassword==NULL|| $phone==NULL || $movie==NULL){
		echo $empty;
	} else{
		
		if ($password!=$cpassword){
			echo $match;
		}else{
			$password= md5($password);
			$check= "SELECT * FROM users WHERE username= '$username' || email='$email' || phone_no='$phone'";
			$q= mysqli_query($con, $check);
			$count= mysqli_num_rows($q);
			if ($count>=1){
				echo $duplicate;
			}else{
				$stmt= "INSERT INTO users (username,password, usertype, phone_no, email, active, answer)
					VALUES('$username','$password','Regular','$phone','$email',0, '$movie')";
				$query1= mysqli_query($con, $stmt);
				if ($query1){
					echo $success;
				} else {
					echo$unable;
				}
			}

		}


	}




}



									

?>


						

							

								

								<div class=" widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<form action="register_user.php" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="cpassword" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="phone" class="form-control" placeholder="Phone Number" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
													</label>

													
													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<input type="submit" name="register" class="width-65 pull-right btn btn-sm btn-success fa fa-arrow-right icon-on-right" value="Register">
															
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
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
