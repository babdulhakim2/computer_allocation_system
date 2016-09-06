<?php
include_once('initi.php');
error_reporting(E_ERROR);
include_once('tablehead.html');

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
								<a href="studentdetails.php">Student</a>
							</li>
							<li class="active">Student details</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Student
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Student details
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Students & Staff Allocation</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											 Results for Allocation Details
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                                                        <th class="center">ID</th>
                                                        <th>Name</th>
                                                        <th>Allocation ID                 </th>
                                                         <th>Computer No.</th>
                                                        <th class="hidden-480">User Type</th>

                                                       
                                                        <th class="hidden-480">Date of Allocation</th>

                                                        <th class="hidden-480">Logged in Username</th>
                                                    </tr>
												</thead>

												<tbody>
													<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM allocation ORDER BY id";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$alloc_id= $row['alloc_id'];
 	$first_name= $row['first_name'];
 	$last_name= $row['last_name'];
 	$other_name= $row['other_name'];
 	$date_entered= $row['date_entered'];
 	$user_type= $row['user_type'];
 	$username= $row['username'];
 	$computer_no= $row['computer_no']; 	
	
 	$name= $first_name." ".$last_name." ".$other_name;
 	

 	echo'<tr>';
 	echo '<td class="center">'.$id.'</td>';
 	echo '<td class="center">'.$name.'</td>';
 	echo '<td class="center">'.$alloc_id.'</td>';
 	echo '<td class="center">'.$computer_no.'</td>';
 	echo '<td class="center">'.$user_type.'</td>';
 	echo '<td class="center">'.$date_entered.'</td>';
 	echo '<td class="center">'.$username.'</td>';
 	
 	
 }
?>
                                                    </tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>

								
							</div><!-- /.col -->
						</div><!-- /.row -->

					</div><!-- /.page-content -->
				</div>
				<div class="row">
	<div class="center">
														<a href="addallocation.php" type="button" class="btn btn-sm btn-primary btn-white btn-round">
															<i class="ace-icon fa fa-plus bigger-150 middle orange2"></i>
															<span class="bigger-110">Add New Allocation</span>

															<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
														</a>
													</div>
</div>
			</div><!-- /.main-content -->


<?php include_once('tablefooter.html');?>