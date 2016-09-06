<?php 
include_once('initi.php');
error_reporting(E_ERROR);
include_once('base.html');

	
	
	
	

$success='	<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
			</button>

				<i class="ace-icon fa fa-check green"></i>

							Computer Details Updated Successfully. <a href="computerdetails.php">View Details</a>
					
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
						Computer Details Already Exist
					
								</div>';




?>
<div class="main-content">
			<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-desktop home-icon"></i>
								<a href="computerdetails.php">Computers</a>
								<li class="active">Add Computers</li>
							</li>
							
						</ul><!-- /.breadcrumb -->

						
					</div>
					
					<!-- PAGE CONTENT BEGINS -->
				<div class="page-content">

						<div class="page-header">
							<h1>
								Add Computer
								
							</h1>
				<div class="row">
					<div class="col-md-6 col-xs-offset-3">
						<?php 
if($_POST['update']){

	$computername= addslashes($_POST['cname']);
	$computersn= addslashes($_POST['csn']);
	$batterysn= addslashes($_POST['btsn']);
	$chargersn= addslashes($_POST['chsn']);
	$computernumber= addslashes($_POST['compnum']);
	$comptype= addslashes($_POST['comptype']);
	$ccondition= addslashes($_POST['ccondition']);
	$id= addslashes($_POST['id']);
	 

	include_once('connect.php');
	if($computername==NULL || $computersn==NULL || $batterysn==NULL || $chargersn==NULL || $computernumber==NULL || $comptype==NULL){
		echo $empty;
	} else {
		$q= "UPDATE computer SET name='$computername', computer_type='$comptype', computer_sn='$computersn', battery_sn='$batterysn',
			 charger_sn='$chargersn', date_entered=NOW(), computer_no='$computernumber', c_cond='$ccondition' WHERE id='$id'";
		$stmt= mysqli_query($con, $q);
		if($stmt==TRUE){
			echo $success;
		} else{
			echo $unable;
		}
	}
}


if (isset($_GET['editid'])){

	$id= $_GET['editid'];
	
	include_once('connect.php');
	$stmt= "SELECT * FROM computer WHERE id= '$id'";
	$q= mysqli_query($con, $stmt);
	while ($row1=mysqli_fetch_assoc($q)) {
		$id= $row1['id']; 
		$name= $row1['name'];
 		$computer_sn= $row1['computer_sn'];
 		$battery_sn= $row1['battery_sn'];
 		$charger_sn= $row1['charger_sn'];
 		$computer_no= $row1['computer_no'];
 		$c_cond= $row1['c_cond'];
 		
		

		
 		
	}
	
}
			
						
?>	
					</div>
				</div>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-md-6 col-xs-offset-1">
								<form action="" method="post" role="">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<thead>
												<td>&nbsp; </td> <td>&nbsp; </td>
											</thead>
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Computer Name:</b></label>
												</td>
												<td>
													<input name="cname" value="<?php echo $name;?>" class="form-control" placeholder="Enter Computer Name" style="width:200px">
												</td>
											</div>
												<div class="form-group">
												<td>
													<label><b>Computer S/N:</b></label>
												</td>
												<td>
													<input name="csn" value="<?php echo $computer_sn;?>" class="form-control" placeholder="Enter Computer S/N" style="width:200px">
												</td>
											</div>
											</div>
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Battery S/N:</b></label>
												</td>
												<td>
													<input name="btsn" value="<?php echo $battery_sn;?>" class="form-control" placeholder="Enter Battery S/N" style="width:200px">
												</td>
											</div>
											<div class="form-group">
												<td>
													<label><b>Charger S/N:</b></label>
												</td>
												<td>
													<input name="chsn" value="<?php echo $charger_sn;?>" class="form-control" placeholder="Enter Charger S/N" style="width:200px">
												</td>
											</div>
										</tr>
										<tr>
											<div class="form-group">
												<td>
													<label><b>Computer Number:</b></label>
												</td>
												<td>
													<input name="compnum" value="<?php echo $computer_no;?>" class="form-control" placeholder="Enter Computer Number" style="width:200px">
												</td>
											</div>
											<div class="form-group">
												<td>
													<label><b>Computer Type:</b></label>
												</td>
												<td>
													<select name="comptype" class="form-control"  style="width:200px">
														<option></option>
														<option>Laptop</option>
														<option>Desktop</option>
													</select>
												</td>
											</div>
										</tr>
										<tr>
											<fieldset class="form-group">
												<td>
													<label for="mulipltest"><b>Computer Condition:</b></label>
												</td>
												<td>
													<select name="ccondition" multiple class="form-control" id="mulipltest" placeholder="Select Computer Condition" style="width:200px">
														
														<option>Good</option>
														<option>Defective Battery</option>
														<option>Defective Charger</option>
														<option>Defective Screen</option>
														<option>Defective Speaker</option>
														<option>Defective Keyboard</option>
														<option>Defective Mouse</option>
														<option>Bad</option>
													</select>
												</td>
											</fieldset>
										</tr>
										<tr>
											<div class="hidden" >
												<td><input name="id" value="<?php echo $id;?>" type="hidden"></td>
											</div>
											<div class="form-group">
												<td>
													<input name="update" type="submit" class="btn btn-success" value="Update Computer Details">
												</td>
											</div>
											<div class="form-group">
												<td>
													<input name="submit" type="reset" class="btn btn-danger btn-lg" value="Reset">
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