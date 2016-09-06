<?php
include_once('initi.php');
error_reporting(E_ERROR);
 include_once('tablehead.html');


?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-users home-icon"></i>
								<span>Student</span>
							</li>
							<li class="active">View Student Records</li>
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Student
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Student Information
								</small>
							</h1>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="">
									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														Profile
													</a>
												</li>

												
											</ul>

											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-2 center">
															<span class="profile-picture">
																<?php 
if (isset($_GET['viewid'])){

	$admission_no= $_GET['viewid'];
	include_once('connect.php');
	$query = "select * from student_image where admission_no= '$admission_no'";
	$result = mysqli_query($con,$query);
	while ($row= mysqli_fetch_array($result)) {
		$image= '<img class="editable img-responsive" height="110px" id="avatar2" src="data:image;base64, '.$row[3].'" >';
		echo $image;
	}

	include_once('connect.php');
	$stmt= "SELECT * FROM students WHERE admission_no= '$admission_no'";
	$q= mysqli_query($con, $stmt);
	while ($row1=mysqli_fetch_assoc($q)) {
		$admission_no= $row1['admission_no'];
 		$first_name= $row1['first_name'];
 		$last_name= $row1['last_name'];
 		$other_name= $row['other_name'];
 		$address= $row1['address'];
 		$city= $row1['city'];
 		$gender= $row1['gender'];
		$dob= $row1['date_of_birth'];
		$age= $row1['age'];
 		$state= $row1['state'];
 		$country= $row1['country'];
 		$course= $row1['course'];
 		$department= $row1['department'];
		$computer_no= $row1['computer_no']; 	
		$date_entered = $row1['date_entered'];

		$name= $first_name." ".$last_name." ".$other_name;
 		$hometown = $address." ".$city." ".$state.", ".$country;
 		if ($computer_no==""){
 			$computer_no= "No Allocation for this User";
 			$computer_sn= "No Allocation for this User";
 			$computer_type= "No Allocation for this User";
 			$battery_sn= "No Allocation for this User";
 			$charger_sn= "No Allocation for this User";
 		} else{
 			$computer_no=$computer_no;
 			$cst= "SELECT * FROM computer WHERE computer_no= '$computer_no'";
 			$qst = mysqli_query($con, $cst);
 			while ($rst= mysqli_fetch_assoc($qst)) {
 				$computer_name= $rst['name'];
 				$computer_type= $rst['computer_type'];
 				$computer_sn= $rst['computer_sn'];
 				$battery_sn= $rst['battery_sn'];
 				$charger_sn= $rst['charger_sn'];
 				$c_cond= $rst['c_cond'];
 				
 			}
 		}
 		
	}
	include_once('connect.php');
	$stm3="SELECT * FROM programs WHERE name= '$course'";
	$q2= mysqli_query($con, $stm3);
	while ($row2=mysqli_fetch_assoc($q2)) {
		$duration = $row2['duration'];
	}
}

	?>																</span>

															<div class="space space-4"></div>
														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">
															<h4 class="green">
																<span class="middle"><?php echo $name; ?></span>

																
															</h4>

															<div class="profile-user-info">
																
																<div class="profile-info-row">
																	<div class="profile-info-name"> <b>Admission No. </b></div>

																	<div class="profile-info-value">
																		<span><?php echo $admission_no;?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> <b>Address:</b> </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span><?php echo $address;?></span>
																		
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> <b>State:</b></div>

																	<div class="profile-info-value">
																		<span><?php echo $state;?></span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> <b>City:</b></div>

																	<div class="profile-info-value">
																		<span><?php echo $city;?></span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> <b>Country:</b></div>

																	<div class="profile-info-value">
																		<span><?php echo $country;?></span>
																	</div>
																</div>
																
																<div class="profile-info-row">
																	<div class="profile-info-name"> <b>Date of Birth:</b></div>

																	<div class="profile-info-value">
																		<span><?php echo $dob;?></span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"><b> Gender: </b></div>

																	<div class="profile-info-value">
																		<span><?php echo $gender;?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"><b> Age: </b></div>

																	<div class="profile-info-value">
																		<span><?php echo $age;?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"><b> Joined Date :</b></div>

																	<div class="profile-info-value">
																		<span><?php echo $date_entered;?></span>
																	</div>
																</div>

																
															</div>

															<div class="hr hr-8 dotted"></div>

															
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-20"></div>

													<div class="row">
														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-book bigger-110"></i>
																		Academic Information
																</div>

																
																		<div class="profile-user-info">
																			<div class="profile-info-row">
																				<div class="profile-info-name"> <b>Department :</b></div>
																					<div class="profile-info-value">
																						<span><?php echo $department;?></span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> <b>Course:</b></div>
																					<div class="profile-info-value">
																						<span><?php echo $course;?></span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> <b>Program Duration:</b></div>
																					<div class="profile-info-value">
																						<span><?php echo $duration;?></span>
																					</div>
																			</div>
																		</div>
																
															</div>
														</div>

														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small header-color-blue2">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-desktop bigger-120"></i>
																		Allocated Computer Details
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="profile-user-info">
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Computer Name:</div>
																					<div class="profile-info-value">
																						<span><?php echo $computer_name;?></span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Computer Number:</div>
																					<div class="profile-info-value">
																						<span><?php echo $computer_no;?></span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Computer Type</div>
																					<div class="profile-info-value">
																						<span><?php echo $computer_type;?></span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Computer Serial Number</div>
																					<div class="profile-info-value">
																						<span><?php echo $computer_sn;?></span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Battery Serial  Number</div>
																					<div class="profile-info-value">
																						<span><?php echo $battery_sn;?> </span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Charger Serial  Number</div>
																					<div class="profile-info-value">
																						<span><?php echo $charger_sn;?> </span>
																					</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name"> Computer Condition</div>
																					<div class="profile-info-value">
																						<span><?php echo $c_cond;?> </span>
																					</div>
																			</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div><!-- /#home -->
												<div class="hr hr-8 dotted"></div>
												<div class="center">
													<form action="revokestd.php" method="post">
														<input type="hidden" name="admnor" value="<?php echo $admission_no;?>">
														<input type="hidden" name="computer_nor" value="<?php echo $computer_no;?>">
														<input type="submit" name="revoke"class="btn btn-sm btn-primary btn-white btn-round icon-on-right ace-icon fa fa-arrow-right" value="Revoke Computer Allocation">
															
													</form>
													</div>
													<div class="hr hr-8 dotted"></div>
												

												

												
											</div>
										</div>
									</div>
								</div>
							
						</div>
<?php include_once('footer.php');?>