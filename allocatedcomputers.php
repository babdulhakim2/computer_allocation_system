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
								<i class="ace-icon fa fa-tachometer home-icon"></i>
								<a href="index.php">Dashboard</a>
							</li>
							
						</ul><!-- /.breadcrumb -->


						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Allocated Computers
								</small>
							</h1>
							 
                                                     
						</div><!-- /.page-header -->
						
                    	<div class="row">
                    		<div class="col-xs-12">
										<h3 class="header smaller lighter blue">  Computers Allocated</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Details of Computers Allocated to Users
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                                                        
                                                        
                                                        <th class="center hidden-480">Computer Name</th>
                                                        <th>Computer S/N</th>
                                                         <th>Battery S/N</th>
                                                        <th class="hidden-480">Charger S/N</th>

                                                       
                                                        <th class="hidden-480">Computer Number</th> 
                                                        <th class="center">Date Entered</th>
                                                        <th class="center">Computer Condition</th>
                                                        <th class="hidden-480">Status </th>

                                                    </tr>
												</thead>

												<tbody>
													

														<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM computer WHERE status= 'allocated' ORDER BY id";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	
 	$cname= $row['name'];
 	$computer_sn= $row['computer_sn'];
 	$battery_sn= $row['battery_sn'];
 	$charger_sn= $row['charger_sn'];
 	$computer_no= $row['computer_no'];
 	$date_e= $row['date_entered'];
 	$status= $row['status'];
 	$c_cond= $row['c_cond'];
 	

 	echo'<tr>';
 	echo '<td class="center">'.$cname.'</td>';
 	echo '<td class="center">'.$computer_sn.'</td>';
 	echo '<td class="center">'.$battery_sn.'</td>';
 	echo '<td class="center">'.$charger_sn.'</td>';
 	echo '<td class="center">'.$computer_no.'</td>';
 	echo '<td class="center">'.$date_e.'</td>';
 	echo '<td class="center">'.$c_cond.'</td>';
 	echo '<td class="center">'.$status.'</td>';
 	
 	echo'</tr>';

 }
?>
                                                   

													

												</tbody>
											</table>
										</div>
									</div>

								</div>

<?php include_once('tablefooter.html');?>