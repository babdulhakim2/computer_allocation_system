<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('indexbase.html');


 $deleted= '	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Computer Details Deleted Successfully
					
								</div>';
$unabledeleted= '	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to  Delete Computer Details
					
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
								<a href="computerdetails.php">Computers</a>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Computer Details
							</h1>
						</div><!-- /.page-header -->
<div class="row">
	<div class="col-md-6 col-xs-offset-3">
<?php
if(isset($_GET['deleteid'])){
	$deleteid= $_GET['deleteid'];
	include_once('connect.php');
	$stmt1="DELETE FROM computer WHERE id='$deleteid'";
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
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													
													<th>Computer Name</th>
													<th>Computer Type</th>
													<th>Computer S/N</th>
													<th class="hidden-480">Battery S/N</th>
													<th class="hidden-480">Charger S/N</th>
													<th class="hidden-480">Computer No.</th>
													<th class="hidden-480">Date Entered</th>
													<th class="hidden-480">Condition</th>
													<th class="hidden-480">Status</th>

													

													<th>Delete</th>
												</tr>
											</thead>

											<tbody>


											<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM computer ORDER BY id";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$name= $row['name'];
 	$computer_type= $row['computer_type'];
 	$computer_sn= $row['computer_sn'];
 	$battery_sn= $row['battery_sn'];
 	$charger_sn= $row['charger_sn'];
 	$computer_no= $row['computer_no'];
 	$date_entered= $row['date_entered'];
 	$cond= $row['c_cond'];
 	$status= $row['status'];
 	
 	

 	echo'<tr>';
 	
 	echo '<td class="center">'.$name.'</td>';
 	echo '<td class="center">'.$computer_type.'</td>';
 	echo '<td class="center">'.$computer_sn.'</td>';
 	echo '<td class="center">'.$battery_sn.'</td>';
 	echo '<td class="center">'.$charger_sn.'</td>';
 	echo '<td class="center">'.$computer_no.'</td>';
 	echo '<td class="center">'.$date_entered.'</td>';
 	echo '<td class="center">'.$cond.'</td>';
 	echo '<td class="center">'.$status.'</td>';
 	
 	echo '<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															
															<a href="computerdetails.php?deleteid='.$id.'" class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</a>
															<a href="editcomputer.php?editid='.$id.'" class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

															
														</div>

														
													</td>';
 	

 }
?>
												

													
												</tr>

											

											
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->

								<div class="hr hr-18 dotted hr-double"></div>

								
<div class="row">
	<div class="col-md-6 col-xs-offset-4">
			<a href="addcomputer.php">
		<button class="btn btn-success btn-lg">Add New Computer</button>
			</a>
	</div>
</div>
								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php include_once('tablefooter.html');?>