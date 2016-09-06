<?php
include_once('initi.php');
error_reporting(E_ERROR);
 include_once('tablehead.html');


 $deleted= '	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Student Details Deleted Successfully
					
								</div>';
$unabledeleted= '	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to  Delete Student Details
					
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
								<a href="">Student</a>
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
	<div class="col-md-6 col-xs-offset-3">
<?php
if(isset($_GET['deleteid'])){
	$deleteid= $_GET['deleteid'];
	include_once('connect.php');
	$stmt1="DELETE FROM students WHERE id='$deleteid'";
	$querydelete= mysqli_query($con, $stmt1);
	if($querydelete==TRUE){
		echo $deleted;
	} else{
		echo $unabledeleted;
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
										<h3 class="header smaller lighter blue">Information About Students</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											 Results for Students information
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                                                       
                                                        <th class="hidden-480">Admission No.</th>
                                                        <th>Name </th>
                                                         <th>Address</th>
                                                        <th class="hidden-480">Course</th>

                                                       
                                                        <th class="hidden-480">Department</th>

                                                        <th class="hidden-480">Computer Allocated</th>
                                                        
                                                         <th class="center">View/Delete</th>
                                                    </tr>
												</thead>

												<tbody>
													<?php 

 include_once('connect.php');
 $stm= "SELECT id, admission_no, first_name,last_name,other_name, address, city,state,country, course, department,date_entered, computer_no FROM students ORDER BY first_name";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$admission_no= $row['admission_no'];
 	$first_name= $row['first_name'];
 	$last_name= $row['last_name'];
 	$other_name= $row['other_name'];
 	$address= $row['address'];
 	$city= $row['city'];
 	$state= $row['state'];
 	$country= $row['country'];
 	$course= $row['course'];
 	$department= $row['department'];
	$computer_no= $row['computer_no']; 	
	$date_entered = $row['date_entered'];
	
 	$name= $first_name." ".$last_name." ".$other_name;
 	$hometown = $address." ".$city." ".$state.", ".$country;
 	if ($computer_no==""){
 		$computer_no= "No Allocation";
 	} else{
 		$computer_no=$computer_no;
 	}

 	echo'<tr>';
 	echo '<td class="center">'.$admission_no.'</td>';
 	echo '<td class="center">'.$name.'</td>';
 	echo '<td class="center">'.$hometown.'</td>';
 	echo '<td class="center">'.$course.'</td>';
 	echo '<td class="center">'.$department.'</td>';
 	echo '<td class="center">'.$computer_no.'</td>';

 	echo '<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															<a href="studentinfo.php?viewid='.$admission_no.'" class="btn btn-xs btn-primary">
																<i class="ace-icon fa fa-eye white bigger-120"></i>
															</a>
															<a href="studentdetails.php?deleteid='.$id.'" class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</a>
															<a href="editstudent.php?editid='.$admission_no.'" class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

															
														</div>

														
													</td>';
 	
 	
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
			<div class="col-md-4">
			<a href="addstudent.php">
			<button class="btn btn-success btn-lg">Add New Students</button> 
		
			</a>
		</div>
		<div class="col-md-4">
			<a href="studentsallocated.php">
			<button class="btn btn-success btn-lg">View Students Allocated </button> 
			
		
			</a>
		</div>
	</div>
</div>
			</div><!-- /.main-content -->


<?php include_once('tablefooter.html');?>