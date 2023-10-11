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
$sem=$_POST['sem'];
$tdate=$_POST['tdate'];
if (isset($_POST['attp']) ) {
    $check = "present";
} else { 
    $check = "absent";
}


$sql="insert into tblattendance(usn,stname,sem,tdate,attendance)values(:usn,:stname,:sem,:tdate,:check)";
$query=$dbh->prepare($sql);
$query->bindParam(':usn',$usn,PDO::PARAM_STR);
$query->bindParam(':stname',$stname,PDO::PARAM_STR);
$query->bindParam(':sem',$sem,PDO::PARAM_STR);
$query->bindParam(':tdate',$tdate,PDO::PARAM_STR);
$query->bindParam(':check',$check,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Attendance has been added.")</script>';
echo "<script>window.location.href ='add-attendance.php'</script>";
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
   
    <title>TRMS Add Attendance</title>
  

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
                        <h1>Attendance Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-attendance.php">Attendance Details</a></li>
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
                            <div class="card-header"><strong>Attendance </strong><small> Details</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
								<div class="form-group col-lg-6">
<label>Student Name</label>
<select type="text" name="stname" id="stname" value="" onChange="myFunction1()" class="form-control" required="true">
<option value="">Select Name</option>
<?php 
$sql2 = "SELECT * from   tblregister where status='verified' ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($result2 as $row1)
{          
?>  
<option data-usn="<?php echo htmlentities($row1->usn);?>" data-sem="<?php echo htmlentities($row1->sem);?>" value="<?php echo htmlentities($row1->stname);?>"><?php echo htmlentities($row1->stname);?></option>
 <?php } ?> 
</select></div>
<div class="form-group col-lg-6">
<label>USN</label><input type="text" name="usn" id="usn" value="" class="form-control" readonly="true">
</div> 
<!--<div class="form-group col-lg-6"><label for="company" class=" form-control-label">USN</label><input type="text" name="usn" value="" class="form-control" id="usn"></div>-->



                               
<script>

function myFunction1(){
 var index = document.getElementById("stname").selectedIndex;
 //alert(index);
    var usn = document.getElementById("stname").options[index].getAttribute("data-usn");
	var sem = document.getElementById("stname").options[index].getAttribute("data-sem");
document.getElementsByName("usn")[0].value = usn ;
document.getElementsByName("sem")[0].value = sem ;
}
</script>

<div class="form-group col-lg-6">
<label>Semester</label><input type="text" name="sem" id="sem" value="" class="form-control" readonly="true">
</div> 

 <div class="form-group col-lg-6"><label for="city" class=" form-control-label">Select Date</label><input type="date" name="tdate" id="tdate" value="" class="form-control" required="true"></div>  
 
 <div class="form-group col-lg-6">
<label>Present</label><input type="checkbox" name="attp" id="attp" value="" onChange="setcheckboxs()" class="form-control">
</div> 
<div class="form-group col-lg-6">
<label>Absent</label><input type="checkbox" name="atta" id="atta" value="" onChange="setcheckboxs()" class="form-control">
</div> 

								
                                              <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
                                                        </button>;&nbsp<button type="reset" class="btn btn-primary btn-sm" name="reset" id="reset">
                                                            <i class="fa fa-dot-circle-o"></i>  Reset
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
							<script>
							function setcheckboxs(){
    var present= document.getElementById("attp");
    var absent = document.getElementById("atta");
    if(present.checked){
      absent.checked = false;
    }else if(absent.checked){
      present.checked = false;
     }
}
</script>
							
</body>
</html>
<?php }  ?>