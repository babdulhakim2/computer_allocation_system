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

							
							<li class="active">Students Allocated</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Students
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Students details
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">List of Students Allocated with Computers</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											 Results for Students Allocation Details
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                                                        <th class="center">ID</th>
                                                        <th>Name</th>
                                                        <th>Admission No.                 </th>
                                                         <th>Computer No.</th>
                                                        <th class="hidden-480">Course</th>

                                                       
                                                        <th class="hidden-480">Date of Allocation</th>

                                                        <th class="hidden-480">Username</th>
                                                    </tr>
												</thead>

												<tbody>
													<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM students WHERE computer_no != '' ORDER BY id";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$admission_no= $row['admission_no'];
 	$first_name= $row['first_name'];
 	$last_name= $row['last_name'];
 	$other_name= $row['other_name'];
 	$date_entered= $row['date_entered'];
 	$course= $row['course'];
 	$username= $row['username'];
 	$computer_no= $row['computer_no']; 	
	
 	$name= $first_name." ".$last_name." ".$other_name;
 	

 	echo'<tr>';
 	echo '<td class="center">'.$id.'</td>';
 	echo '<td class="center">'.$name.'</td>';
 	echo '<td class="center">'.$admission_no.'</td>';
 	echo '<td class="center">'.$computer_no.'</td>';
 	echo '<td class="center">'.$course.'</td>';
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
	<div class="col-md-6 col-xs-offset-4">
			<a href="allocatestudent.php">
		<button class="btn btn-success btn-lg">Add New Student Allocation</button>
			</a>
	</div>
</div>
			</div><!-- /.main-content -->


<?php include_once('tablefooter.html');?>