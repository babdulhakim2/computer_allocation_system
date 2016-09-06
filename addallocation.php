<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');



?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon home-icon"></i>
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
						
					</div>
				</div>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-md-6 col-xs-offset-1">
								
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<thead>
												<td>&nbsp; </td> <td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											<div class="hidden" >
												<td></td>
											</div>
											<div class="form-group">
												<td>
													 <i class="fa fa-group fa-5x"></i> 
												</td>
											</div>
											<div class="form-group">
												<td>
													 <i class="fa fa-child fa-5x"></i>
												</td>
											</div>
										</tr>


										
										<tr>
											<div class="hidden" >
												<td></td>
											</div>
											<div class="form-group">
												<td>
													<a href="allocatestudent.php" type="button" class="btn btn-lg btn-success">Allocate Student</a>
												</td>
											</div>

											
											<div class="form-group">
												<td>
													<a href="allocatestaff.php" type="button" class="btn btn-lg btn-success">Allocate Staff</a>
												</td>
											</div>

										</tr>

									</table>
								

							
							</div>
							
						</div>
					<!-- PAGE CONTENT ENDS-->
				</div>
			</div>
		</div>
		
<?php include_once('footer.php');?>