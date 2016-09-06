<?php

$match='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Password Does not match. 
								</div>';
$changed='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Password Changed Successfully. <a href="login.php">Back to Login</a>
								</div>';
$unable='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Unable to Change Password. 
								</div>';
$empty='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					All fields are required. 
								</div>';
$dontmatch='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Favorite Movie Answer Does Not match. 
								</div>';
$usermatch='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
					Username does not exist. 
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
									<span class="white" id="id-text2">Change Password</span>
								</h1>
								<h4 class="light-blue" id="id-company-text">&copy; Dialogue Computer Institute</h4>
							</div>
<?php



if(isset($_POST['submit'])){
	include_once('connect.php');
	$username=$_POST['rusername'];
	$movie=$_POST['rmovie'];
	$newpassword=$_POST['newpassword'];
	$cnewpassword=$_POST['cnewpassword'];

	if($username==NULL || $movie==NULL || $newpassword==NULL || $cnewpassword==NULL){
		echo $empty;
	} else{
		if($newpassword!=$cnewpassword){
			echo $match;
		} else{
			$stmt="SELECT * FROM users WHERE username='$username'";
			$query= mysqli_query($con, $stmt);
			$count= mysqli_num_rows($query);
			if($count>0){
				while ($row=mysqli_fetch_assoc($query)) {
					$answer= $row['answer'];
					if ($movie==$answer) {
						$newpassword= md5($newpassword);
						$stmt2="UPDATE users SET password='$newpassword' WHERE username='$username'";
						$query2= mysqli_query($con, $stmt2);
						if ($query2==TRUE) {
							echo $changed;
						} else{
							echo $unable;
						}
						
					}else {
						echo $dontmatch;
					}
				}

			}else{
				echo$usermatch;
			}
			
		}

	}
}



?>
							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-key green"></i>
												Enter Your Information to change Password
											</h4>

											<div class="space-6"></div>

											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="rusername" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="rmovie" class="form-control" placeholder="Your Favorite Movie" />
															<i class="ace-icon fa fa-desktop"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="newpassword" class="form-control" placeholder="New Password" />
															<i class="ace-icon fa fa-key"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="cnewpassword" class="form-control" placeholder="Confirm Password" />
															<i class="ace-icon fa fa-key"></i>
														</span>
													</label>

													<div class="clearfix">
														<input type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-success" value="Submit">
															
															
													</div>
												</fieldset>
											</form>

											

											<div class="space-6"></div>

											
										</div><!-- /.widget-main -->

										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								

								
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
		
		<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=286371564842269";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			
		</script>
	</body>
</html>
