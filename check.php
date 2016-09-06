<?php
session_start();
if(isset($_REQUEST['login'])){
	$uname= $_REQUEST['username'];
	$pswd= $_REQUEST['pswd'];
	$pswd= md5($pswd);
	include_once('connect.php');
	$stmt="SELECT * FROM users WHERE username='$uname' && password='$pswd'";
	$query= mysqli_query($con, $stmt);
	$count= mysqli_num_rows($query);

	if($count!=1){
		header("location:login.php?msg=Incorrect%20Usernamen%20or%20Password%20Details%20!&type=error");
	}elseif ($count==1) {
		while ($row=mysqli_fetch_assoc($query)) {
			$active= $row['active'];
			if($active==0){
				header("location:login.php?inactive=Account%20not%20activated%20!&type=error");
			} elseif ($active==1) {
				$_SESSION['id']=$row['id'];
				$_SESSION['username']= $row['username'];
				$_SESSION['usertype']= $row['usertype'];
				if($row['usertype']=="Admin"){
					header("location:index.php");
				}elseif ($row['usertype']=="Regular") {
					header("location:index.php");
				}
			}
		}
	}
	
}


?>