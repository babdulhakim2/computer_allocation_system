<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							Program Added Successfully
					
								</div>';
$empty='	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						All fields are required
					
								</div>';

?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-desktop home-icon"></i>
								<a href="program.php">Program</a>
								<li class="active">Add Program</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Program
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Add Program
								</small>
							</h1>
				
						</div>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
<?php
if ($_POST['submit']){
	$pname= $_POST['pname'];
	$pdep= $_POST['pdep'];
	$pduration= $_POST['pduration'];

	if ($pname==NULL || $pdep==NULL|| $pduration==NULL){
		echo $empty;
	} else {

		include_once('connect.php');
		$q1="INSERT INTO programs (name, department, duration) VALUES('$pname','$pdep','$pduration')";
		$stm1= mysqli_query($con, $q1);
		if($stm1==TRUE){
			echo $success;

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
												<td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Program Name:</b></label>
												</td>
												<td>
													<input name="pname" class="form-control" placeholder="Enter Program Name" style="width:200px">
												</td>
											</div>

											<div class="form-group">
												<td>
													<label><b>Department:</b></label>
												</td>
												<td>
													<?php

include_once('connect.php');
$stm= "SELECT * FROM department";
$q= mysqli_query($con, $stm);

echo '<select name="pdep">';
while ($row= mysqli_fetch_assoc($q)){
	echo '<option>'.$row['name'].'</option>';
	
}
echo '</select>';
	?>
												</td>
											</div>

											<div class="form-group">
												<td>
													<label><b>Duration:</b></label>
												</td>
												<td>
													<input name="pduration" class="form-control" placeholder="Program Duration" style="width:200px">
												</td>
											</div>
											
											
										</tr>
										
										
										<tr>
											<div class="hidden" >
												<td></td>
											</div>
											<div class="form-group">
												<td>
													<input name="submit" type="submit" class="btn btn-success" value="Add Computer">
												</td>
											</div>
											
											
											<div class="form-group">
												
												<td>
													
												</td>
											</div>
										
											<div class="form-group">
												<td>
													<input name="submit" type="reset" class="btn btn-danger btn-lg" value="Reset">
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