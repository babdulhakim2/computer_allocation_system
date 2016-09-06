<?php
include_once('initi.php');
error_reporting(E_ERROR);

include_once('tablehead.html');

$success= ' <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
            </button>
                        Allocation Details Deleted Successfully
                    
                                </div>';
$unable= '   <div class="alert alert-block alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
            </button>
                        Unable to  Delete Allocation Details
                    
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
									Overview &amp; Stats
								</small>
							</h1>
							 
                                                     
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-lg-3 col-md-6">
                        	<div class="panel panel-yellow">
                            	<div class="panel-heading">
                                	<div class="row">
                                    	<div class="col-xs-3">
                                       	 <i class="fa fa-desktop fa-3x"></i>
                                    	</div>
                                    	<div class="col-xs-9 text-right"><?php 
                                        include_once('connect.php');
                                        $stm1= "SELECT * FROM computer WHERE status= 'returned'";
                                        $q1= mysqli_query($con, $stm1);
                                        $rows= mysqli_num_rows($q1);
?>
                                        	<div class="huge"><?php echo $rows; ?></div>
                                        	<div><span class="i-text"><b>Available Computers</b></span></div>
                                    	</div>
                                	</div>
                            	</div>
                            	<a href="availablecomputers.php">
                                	<div class="panel-footer">
                                    	<span class="pull-left">View Details</span>
                                    	<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    	<div class="clearfix"></div>
                                	</div>
                            	</a>
                        	</div>
                    		</div>
                    		<div class="col-lg-3 col-md-6">
                        	<div class="panel panel-primary">
                            	<div class="panel-heading">
                                	<div class="row">
                                    	<div class="col-xs-3">
                                       	 <i class="fa fa-tasks fa-3x"></i>
                                    	</div>
                                    	<div class="col-xs-9 text-right">
                                            <?php 
                                        
                                        $stm1= "SELECT * FROM computer WHERE status= 'allocated'";
                                        $q1= mysqli_query($con, $stm1);
                                        $rows2= mysqli_num_rows($q1);
?>
                                        	<div class="huge"><?php echo $rows2; ?></div>
                                        	<div><span class="i-text"><b>Allocated Computers</b></span></div>
                                    	</div>
                                	</div>
                            	</div>
                            	<a href="allocatedcomputers.php">
                                	<div class="panel-footer">
                                    	<span class="pull-left">View Details</span>
                                    	<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    	<div class="clearfix"></div>
                                	</div>
                            	</a>
                        	</div>
                    		</div>
                    		<div class="col-lg-3 col-md-6">
                        	<div class="panel panel-red">
                            	<div class="panel-heading">
                                	<div class="row">
                                    	<div class="col-xs-3">
                                       	 <i class="fa fa-users fa-3x"></i>
                                    	</div>
                                    	<div class="col-xs-9 text-right">
                                            <?php 
                                        
                                        $stm1= "SELECT * FROM students WHERE computer_no != ''";
                                        $q1= mysqli_query($con, $stm1);
                                        $rows3= mysqli_num_rows($q1);
?>
                                        	<div class="huge"><?php echo $rows3; ?></div>
                                        	<div><span class="i-text"><b>Students Allocated</b></span></div>
                                    	</div>
                                	</div>
                            	</div>
                            	<a href="studentsallocated.php">
                                	<div class="panel-footer">
                                    	<span class="pull-left">View Details</span>
                                    	<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    	<div class="clearfix"></div>
                                	</div>
                            	</a>
                        	</div>
                    		</div>
                    		<div class="col-lg-3 col-md-6">
                        	<div class="panel panel-green">
                            	<div class="panel-heading">
                                	<div class="row">
                                    	<div class="col-xs-3">
                                       	 <i class="fa fa-child fa-3x"></i>
                                    	</div>
                                    	<div class="col-xs-9 text-right">
                                    		<?php 
                                        
                                        $stm1= "SELECT * FROM staff WHERE computer_no != ''";
                                        $q1= mysqli_query($con, $stm1);
                                        $rows3= mysqli_num_rows($q1);
?>
                                        	<div class="huge"><?php echo $rows3; ?></div>
                                        	<div><span class="i-text"><b>Staff Allocated</b></span></div>
                                    	</div>
                                	</div>
                            	</div>
                            	<a href="staffallocated.php">
                                	<div class="panel-footer">
                                    	<span class="pull-left">View Details</span>
                                    	<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    	<div class="clearfix"></div>
                                	</div>
                            	</a>
                        	</div>
                    		</div>
<div class="row">
    <div class="col-md-6 col-xs-offset-3">
<?php
if(isset($_POST['submit'])){        //Set submit input
    $id= $_POST['id'];
    $computer_no= $_POST['computer_no'];
    $user_type= $_POST['user_type'];
    $alloc_id= $_POST['alloc_id'];
    
    include_once('connect.php');    //connect to db
    if($user_type=='Student'){
        $sstmt="DELETE FROM allocation WHERE alloc_id='$alloc_id' && id='$id'";
        $squery= mysqli_query($con, $sstmt);
        $stmt2= "UPDATE students SET computer_no='' WHERE admission_no='$alloc_id'";
        $query2= mysqli_query($con, $stmt2);
        $stmt3="UPDATE computer SET status='returned' WHERE computer_no='$computer_no'";
        $query3= mysqli_query($con,$stmt3);

    }elseif ($user_type=='Staff') {
        $stmt="DELETE FROM allocation WHERE alloc_id='$alloc_id' && id= '$id'";
        $query=mysqli_query($con, $stmt);
        $stmt6= "UPDATE staff SET computer_no='' WHERE phone_no='$alloc_id'";
        $query6= mysqli_query($con, $stmt6);
        $stmt7="UPDATE computer SET status='returned' WHERE computer_no='$computer_no'";
        $query7= mysqli_query($con,$stmt7);
    }
    if($query3 || $query7==TRUE){

        echo $success;
    }  else {

        echo $unable;
    }
}

?>
    </div>
</div>
                    		<div class="col-xs-12">
										<h3 class="header smaller lighter blue"> Recent Allocations</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											 Results for "Recent Allocaion"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
                                                      
                                                        <th>Person Allocated</th>
                                                        <th>Computer Number</th>
                                                         <th>
                                                            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                           Date/Time of Allocation
                                                        </th>
                                                        <th class="hidden-480">Alloc User Type </th>

                                                       
                                                        <th class="hidden-480">Allocation ID</th>

                                                        <th class="hidden-480">Logged in Username </th>
                                                         <th class="center">Delete</th>
                                                    </tr>
												</thead>

												<tbody>
													<?php 
 include_once('connect.php');
 $stm= "SELECT * FROM allocation ORDER BY id DESC";
 $q= mysqli_query($con, $stm);
 while ($row= mysqli_fetch_assoc($q)){
    $id= $row['id'];
    $first_name= $row['first_name'];
    $last_name= $row['last_name'];
    $other_name= $row['other_name'];
    $alloc_id= $row['alloc_id'];
    $date_entered= $row['date_entered'];
    $user_type= $row['user_type'];
    $username= $row['username'];
    $computer_no= $row['computer_no'];  
    
    $name= $first_name." ".$last_name." ".$other_name;
    

    echo'<tr>';
   
    echo '<td class="center">'.$name.'</td>';
    echo '<td class="center">'.$computer_no.'</td>';
    echo '<td class="center">'.$date_entered.'</td>';
    echo '<td class="center">'.$user_type.'</td>';
    echo '<td class="center">'.$alloc_id.'</td>';
    echo '<td class="center">'.$username.'</td>';
    echo '<td>
                                                        <div class="hidden-sm hidden-xs btn-group">
                                                           <form action="" method="post"> 
                                                           <input name="id" type="hidden" value="'.$id.'">
                                                            <input name="computer_no" type="hidden" value="'.$computer_no.'">
                                                            <input name="alloc_id" type="hidden" value="'.$alloc_id.'">
                                                            <input name="user_type" type="hidden" value="'.$user_type.'">
                                                            <button name="submit" type="submit" class="btn btn-xs btn-danger">
                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                            </button>
                                                            </form>

                                                            
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
							
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="row">
									
								</div>

								
							<?php include_once('tablefooter.html');?>
						
					</div><!-- /.page-content -->
