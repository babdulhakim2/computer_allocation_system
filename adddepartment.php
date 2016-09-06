<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							Department Added Successfully
					
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
								<a href="department.php">Department</a>
								<li class="active">Add Department</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Department
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Add Department
								</small>
							</h1>
				
						</div>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
<?php
if ($_POST['submit']){
	$dname= trim($_POST['dname']);
	$dcat= trim($_POST['dcat']);
	$ddesc=trim($_POST['ddesc']);
	if ($dname==NULL || $dcat==NULL|| $ddesc==NULL){
		echo $empty;
	} else {
		include_once('connect.php');
		$q1="INSERT INTO department (name, category, description) VALUES('$dname','$dcat','$ddesc')";
		$stm1= mysqli_query($con, $q1);
			if ($stm1==TRUE) {
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
													<label><b>Department Name:</b></label>
												</td>
												<td>
													<input name="dname" class="form-control" placeholder="Enter Department Name" style="width:200px">
												</td>
											</div>

												<div class="form-group">
												<td>
													<label><b>Department Category:</b></label>
												</td>
												<td>
													<input name="dcat" class="form-control" placeholder="Enter Department Category" style="width:200px">
												</td>
											</div>
											</div>
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Department Description:</b></label>
												</td>
												<td>
													<input name="ddesc" class="form-control" placeholder="" style="height:100px" >
												</td>
											</div>
											
										</tr>
										<tr>
											
											<div class="form-group">
												<td>
													
												</td>
												<td>
													
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