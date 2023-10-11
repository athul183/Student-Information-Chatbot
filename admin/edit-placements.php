<?php
session_start();

include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$evtname=$_POST['evtname'];
$evtdate=$_POST['evtdate'];
$evtloc=$_POST['evtloc'];
$evtdesc=$_POST['evtdesc'];

 $sql="update tblplacements set compname=:evtname,comploc=:evtloc,compdate=:evtdate,compdesc=:evtdesc where id=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':evtname',$evtname,PDO::PARAM_STR);
$query->bindParam(':evtloc',$evtloc,PDO::PARAM_STR);
$query->bindParam(':evtdate',$evtdate,PDO::PARAM_STR);
$query->bindParam(':evtdesc',$evtdesc,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Placement info has been updated")</script>';
	header('location:manage-placements.php');
  }
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Placements</title>
  
    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Placements</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-placements.php">Update Placements</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Placement</strong><small> Detail</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
 <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblplacements where id=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                
 <div class="form-group"><label for="company" class=" form-control-label">Company Name</label><input type="text" name="evtname" value="<?php  echo $row->compname;?>" class="form-control" id="evtname" required="true">
								</div>
								<div class="form-group"><label for="company" class=" form-control-label">Placements Location</label><input type="text" name="evtloc" value="<?php  echo $row->comploc;?>" class="form-control" id="evtloc" required="true">
								</div>
								<div class="form-group"><label for="company" class=" form-control-label">Placements Date</label><input type="date" name="evtdate" value="<?php  echo $row->compdate;?>" class="form-control" id="evtdate" required="true">
								</div>
								<div class="form-group"><label for="company" class=" form-control-label">Job Details</label>
								<textarea class="form-control" id="evtdesc" name="evtdesc" rows="10" cols="50" required="true"><?php  echo $row->compdesc;?></textarea>                                  
                                        
                                            
                                                    
                                                    </div>
                                                   <?php $cnt=$cnt+1;}} ?> 
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Update
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>