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
					Student Already Allocated
					
								</div>';



?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon  home-icon"></i>
								<a href="index.php">Dashboard</a>
								<li class="active">Revoke Staff Allocation</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Select details to Revoke
							</h1>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
						
					</div>
				</div>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-md-6 col-xs-offset-1">
								<form action="staffrevokedetails.php" method="post" role="">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<thead>
												<td>&nbsp; </td> <td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											
											<div class="form-group">
												<td>
													<label><b> Select Staff Phone Number :</b></label>
												</td>
												<td>
													<?php

include_once('connect.php');
$stm= "SELECT * FROM staff";
$q= mysqli_query($con, $stm);

echo '<select name="phone_no" style="width:268px">';
while ($row= mysqli_fetch_assoc($q)){
	echo '<option>'.$row['phone_no'].'</option>';
	
}
echo '</select>';
	?>
												</td>
											</div>
											</div>
												
											
											
										</tr>
										
										<tr>
											<div class="hidden">
												<td>
													
												</td>
											</div>
											<div class="form-group">
												<td>
													<input name="submit" type="submit" class="btn btn-lg btn-success" value="View Staff Allocation Details">
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