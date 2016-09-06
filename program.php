<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('indexbase.html');


 $deleted= '	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Programs Details Deleted Successfully
					
								</div>';
$unabledeleted= '	<div class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>
						Unable to  Delete Programs Details
					
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
								<a href="program.php">Programs</a>
							</li>
							
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Programs
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Program Details
								</small>
							</h1>
						</div><!-- /.page-header -->
<div class="row">
	<div class="col-md-6 col-xs-offset-3">
<?php
if(isset($_GET['deleteid'])){
	$deleteid= $_GET['deleteid'];
	include_once('connect.php');
	$stmt1="DELETE FROM programs WHERE id='$deleteid'";
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
													<th class="center">ID</th>
													<th>Name</th>
													<th>Department</th>
													<th class="hidden-480">Duration</th>

													

													<th></th>
												</tr>
											</thead>

											<tbody>


											<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM programs ORDER BY id";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
 	$id= $row['id'];
 	$name= $row['name'];
 	$department= $row['department'];
 	$duration= $row['duration'];
 	
 	

 	echo'<tr>';
 	echo '<td class="center">'.$id.'</td>';
 	echo '<td class="center">'.$name.'</td>';
 	echo '<td class="center">'.$department.'</td>';
 	echo '<td class="center">'.$duration.'</td>';
 	
 	echo '<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															
															<a href="program.php?deleteid='.$id.'" class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
			<a href="addprogram.php">
		<button class="btn btn-success btn-lg">Add New Program</button>
			</a>
	</div>
</div>
								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php include_once('tablefooter.html');?>