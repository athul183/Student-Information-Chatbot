<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];

$usn=$_POST['usn'];
$stname=$_POST['stname'];
$sub=$_POST['sub'];
$sem=$_POST['sem'];
$tdate=$_POST['tdate'];

$sql="insert into tbltimetable(email,lname,subjects,sem,tdate)values(:usn,:stname,:sub,:sem,:tdate)";
$query=$dbh->prepare($sql);
$query->bindParam(':usn',$usn,PDO::PARAM_STR);
$query->bindParam(':stname',$stname,PDO::PARAM_STR);
$query->bindParam(':sub',$sub,PDO::PARAM_STR);
$query->bindParam(':sem',$sem,PDO::PARAM_STR);
$query->bindParam(':tdate',$tdate,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Timetable has been added.")</script>';
echo "<script>window.location.href ='add-timetable.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>TRMS Add Timetable</title>
  

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
                        <h1>Timetable Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-timetable.php">Timetable Details</a></li>
                            <li class="active">Add</li>
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
                            <div class="card-header"><strong>Timetable </strong><small> Details</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
								<div class="form-group col-lg-6">
<label>Lecturer Name</label>
<select type="text" name="stname" id="stname" value="" onChange="myFunction1()" class="form-control" required="true">
<option value="">Select Name</option>
<?php 
$sql2 = "SELECT * from   tblteacher ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($result2 as $row1)
{          
?>  
<option data-usn="<?php echo htmlentities($row1->Email);?>" data-sub="<?php echo htmlentities($row1->TeacherSub);?>" data-sem="<?php echo htmlentities($row1->sem);?>" value="<?php echo htmlentities($row1->Name);?>"><?php echo htmlentities($row1->Name);?></option>
 <?php } ?> 
</select></div>
<div class="form-group col-lg-6">
<label>Email</label><input type="text" name="usn" id="usn" value="" class="form-control" readonly="true">
</div> 
<div class="form-group col-lg-6">
<label>Subject</label><input type="text" name="sub" id="sub" value="" class="form-control" readonly="true">
</div> 
<!--<div class="form-group col-lg-6"><label for="company" class=" form-control-label">USN</label><input type="text" name="usn" value="" class="form-control" id="usn"></div>-->



                               
<script>

function myFunction1(){
 var index = document.getElementById("stname").selectedIndex;
 //alert(index);
    var usn = document.getElementById("stname").options[index].getAttribute("data-usn");
	var sub = document.getElementById("stname").options[index].getAttribute("data-sub");
	var sem = document.getElementById("stname").options[index].getAttribute("data-sem");
document.getElementsByName("usn")[0].value = usn ;
document.getElementsByName("sub")[0].value = sub ;
document.getElementsByName("sem")[0].value = sem ;
}
</script>

<div class="form-group col-lg-6">
<label>Semester</label><input type="text" name="sem" id="sem" value="" class="form-control" readonly="true">
</div> 

 <div class="form-group col-lg-12"><label for="city" class=" form-control-label">Select Date & Time</label><input type="datetime-local" name="tdate" id="tdate" value="" class="form-control" required="true"></div>  

								
                                              <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
                                                        </button></p>
                                                    
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