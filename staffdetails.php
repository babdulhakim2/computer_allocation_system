<?php
include_once('initi.php');
error_reporting(E_ERROR);
include_once('tablehead.html');



 $deleted= '	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Staff Details Deleted Successfully
					
								</div>';
$unabledeleted= '	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to  Delete Staff Details
					
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
								<a href="staffdetails.php">Staff</a>
							</li>
							<li class="active">Staff details</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Staff
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Staff details
								</small>
							</h1>
						</div><!-- /.page-header -->
<div class="row">
	<div class="col-md-6 col-xs-offset-3">
<?php
if(isset($_GET['deleteid'])){
	$deleteid= $_GET['deleteid'];
	include_once('connect.php');
	$stmt1="DELETE FROM staff WHERE id='$deleteid'";
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
										<h3 class="header smaller lighter blue">Information About Staff </h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											 Results for Staff Details
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                                                        
                                                        <th>Name</th>
                                                        <th>Address      </th>
                                                         <th>Phone Number</th>
                                                        <th class="hidden-480">Position</th>

                                                       
                                                        <th class="hidden-480">Computer Allocated</th>

                                                        <th class="hidden-480">Date Entered</th>
                                                         <th class="hidden-480">View/Delete</th>
                                                    </tr>
												</thead>

												<tbody>
													<?php 
 include_once('connect.php');
 $stm= "SELECT id, first_name,last_name,other_name, address, city,state,country, phone_no, date_entered, computer_no, position FROM staff ORDER BY first_name";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$first_name= $row['first_name'];
 	$last_name= $row['last_name'];
 	$other_name= $row['other_name'];
 	$address= $row['address'];
 	$city= $row['city'];
 	$state= $row['state'];
 	$country= $row['country'];
 	$phone_no= $row['phone_no'];
 	$date_entered= $row['date_entered'];
	$computer_no= $row['computer_no']; 	
	$position= $row['position'];
	
 	$name= $first_name." ".$last_name." ".$other_name;
 	$hometown = $address." ".$city.". ".$state.", ".$country;
 	if ($computer_no==""){
 		$computer_no= "No Allocation";
 	} else{
 		$computer_no=$computer_no;
 	}

 	echo'<tr>';
 	echo '<td class="center">'.$name.'</td>';
 	echo '<td class="center">'.$hometown.'</td>';
 	echo '<td class="center">'.$phone_no.'</td>';
 	echo '<td class="center">'.$position.'</td>';
 	echo '<td class="center">'.$computer_no.'</td>';
 	echo '<td class="center">'.$date_entered.'</td>';
 	echo '<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															<a href="staffinfo.php?viewid='.$phone_no.'" class="btn btn-xs btn-primary">
																<i class="ace-icon fa fa-eye white bigger-120"></i>
															</a>
															<a href="staffdetails.php?deleteid='.$id.'" class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</a>
															<a href="editstaff.php?editid='.$phone_no.'" class="btn btn-xs btn-success">
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
	<div class="col-md-8 col-xs-offset-3">
			<div class="col-md-4">
			<a href="addstaff.php">
			<button class="btn btn-success btn-lg">Add New Staff</button> 
		
			</a>
		</div>
		<div class="col-md-4">
			<a href="staffallocated.php">
			<button class="btn btn-success btn-lg">View Staff Allocated </button> 
		
			</a>
		</div>
	</div>
</div>
			</div><!-- /.main-content -->


<?php include_once('tablefooter.html');?>