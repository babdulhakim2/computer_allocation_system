<?php
include_once('initi.php');
error_reporting(E_ERROR);
 include_once('tablehead.html');


$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							User Deleted Successfully.
	
								</div>';
$unable='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to Delete User. 
								</div>';
$activated='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						User is Already Active. 
								</div>';

$deactivated='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						User is Already Inactive. 
								</div>';

$activateuser='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							User Activated Successfully.
	
								</div>';
$deactivateuser='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							User Deactivated Successfully. 
	
								</div>';
$unableactivate='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to Activate User. 
					
								</div>';
$unabledeactivate='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to Deactivated User. 
					
								</div>';

?>

<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>

							<li>
								<span>Users</span>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Users
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Users Detail
								</small>
							</h1>
						</div><!-- /.page-header -->
<div class="row">
	<div class="col-md-6 col-xs-offset-3">
<?php
if(isset($_GET['deleteid'])){
	$deleteid= $_GET['deleteid'];
	include_once('connect.php');
	$stm= "DELETE FROM users WHERE id= '$deleteid' ";
	$query= mysqli_query($con, $stm);
	if ($query==TRUE){

		echo $success;
	}else {
		echo $unable;
	}


}

if(isset($_GET['activate'])){
	$id= $_GET['activate'];
	include_once('connect.php');
	$stmt2="SELECT * FROM users WHERE id='$id'";
	$query2=mysqli_query($con, $stmt2);
	while ($row=mysqli_fetch_assoc($query2)) {
		$active= $row['active'];
		if($active==1){
			echo $activated;
		}elseif ($active==0) {
			$stm= "UPDATE users SET active=1, usertype='Admin' WHERE id= '$id' ";
			$query= mysqli_query($con, $stm);
			if ($query==TRUE){

				echo $activateuser;
			}else {
				echo $unableactivate;
			}
		}
	}
}

if(isset($_GET['deactivate'])){
	$id= $_GET['deactivate'];
	include_once('connect.php');
	$stmt2="SELECT * FROM users WHERE id='$id'";
	$query2=mysqli_query($con, $stmt2);
	while ($row=mysqli_fetch_assoc($query2)) {
		$active= $row['active'];
		if($active==0){
			echo $deactivated;
		}elseif ($active==1) {
			$stm= "UPDATE users SET active=0, usertype='Regular' WHERE id= '$id' ";
			$query= mysqli_query($con, $stm);
			if ($query==TRUE){

				echo $deactivateuser;
			}else {
				echo $unabledeactivate;
			}
		}
	}
}

?>		
							
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">ID</th>
													<th>Userame</th>
													<th>Usertype</th>
													<th class="hidden-480">Phone Number</th>

													

													<th></th>
												</tr>
											</thead>

											<tbody>


											<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM users ORDER BY id";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$username= $row['username'];
 	$usertype= $row['usertype'];
 	$phone_no= $row['phone_no'];
 	
 	

 	echo'<tr>';
 	echo '<td class="center">'.$id.'</td>';
 	echo '<td class="center">'.$username.'</td>';
 	echo '<td class="center">'.$usertype.'</td>';
 	echo '<td class="center">'.$phone_no.'</td>';
 	
 	echo '<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															
															
															<a  href="users.php?activate='.$id.'" class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-check bigger-120"></i>
															</a>
															<a href="users.php?deactivate='.$id.'" class="btn btn-xs btn-primary">
																<i class="ace-icon fa fa-close bigger-120"></i>
															</a>
															<a href="users.php?deleteid='.$id.'" class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</a>
															

															
														</div>

														
													</td>';
 }
?>
												

													
												</tr>

											

											
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->

								<div class="hr hr-18 dotted hr-double"></div>

								
<div class="row">
	<div class="col-md-6 col-xs-offset-4">
			<a href="addusers.php">
		<button class="btn btn-success btn-lg">Add New User</button>
			</a>
	
	
	</div>
</div>
								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php include_once('tablefooter.html');?>