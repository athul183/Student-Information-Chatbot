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
 $tname=$_POST['tname'];
$email=$_POST['email'];
$mobnum=$_POST['mobilenumber'];
$address=$_POST['address'];
$quali=$_POST['qualifications'];
$tsubjects=$_POST['tsubjects'];
$sem=$_POST['sem'];
$tdate=$_POST['joiningdate'];
$pwd=md5($_POST['pwd']);
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="insert into tblteacher(Name,Picture,Email,MobileNumber,Qualifications,Address,TeacherSub,sem,JoiningDate,pwd)values(:tname,:tpics,:email,:mobilenumber,:qualifications,:address,:tsubjects,:sem,:joiningdate,:pwd)";
$query=$dbh->prepare($sql);
$query->bindParam(':tname',$tname,PDO::PARAM_STR);
$query->bindParam(':tpics',$propic,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':qualifications',$quali,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':tsubjects',$tsubjects,PDO::PARAM_STR);
$query->bindParam(':sem',$sem,PDO::PARAM_STR);
$query->bindParam(':joiningdate',$tdate,PDO::PARAM_STR);
$query->bindParam(':pwd',$pwd,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Teacher Detail has been added.")</script>';
echo "<script>window.location.href ='add-teacher.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Chatbot Add Lecturer</title>
  

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
                        <h1>Lecturer Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-teacher.php">Lecturer Details</a></li>
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
                            <div class="card-header"><strong>Lecturer </strong><small> Details</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">Lecturer Name</label><input type="text" name="tname" value="" class="form-control" id="tname" required="true"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Lecturer Pic</label><input type="file" name="propic" value="" class="form-control" id="propic" required="true"></div>
                                                                          
                                        <div class="form-group"><label for="street" class=" form-control-label">Lecturer Email ID</label><input type="text" name="email" value="" id="email" class="form-control" required="true"></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Lecturer Qualifications(Sepereted by comma)</label><input type="text" name="qualifications" id="qualifications" value="" class="form-control" required="true"></div>
                                                    </div>
                                        
                                                    
                                                    </div>
                                                    <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Lecturer Mobile Number</label><input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+"></div>
                                                    </div>
                                                   
                                                    
                                                    </div>
                                                    <div class="row form-group">
                                                <div class="col-6">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Lecturer Subjects</label><select type="text" name="tsubjects" id="tsubjects" value="" onChange="myFunction()" class="form-control" required="true">
<option value="">Select Subject</option>
<?php 




$sql2 = "SELECT * from  tblsubjects";

$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($result2 as $row1)
{          
?>  

<option data-sem="<?php echo htmlentities($row1->sem);?>" value="<?php echo htmlentities($row1->Subject);?>"><?php echo htmlentities($row1->Subject);?></option>
 <?php } ?> 
</select></div>
                                                    </div>
													<div class="form-group col-lg-6">
<label>Semester</label><input type="text" name="sem" id="sem" value="" class="form-control" readonly="true">
</div> 
                                               
                                                    
                                                    </div>
                                                    <div class="row form-group">
                                                <div class="col-12">
   <div class="form-group"><label for="city" class=" form-control-label">Lecturer Address</label><textarea type="text" name="address" id="address" value="" class="form-control" rows="4" cols="12" required="true"></textarea></div>
                                                    </div>
                                                    <div class="col-6">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Joining Date</label><input type="date" name="joiningdate" id="joiningdate" value="" class="form-control" required="true"></div>
                                                    </div>
													
													<div class="form-group col-lg-6">
<label>Password</label><input type="password" name="pwd" id="pwc" value="" class="form-control" required="true">
</div> 
                                                    
                                                    </div>
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
							
							<script>


   function myFunction(){
 var index = document.getElementById("tsubjects").selectedIndex;
 //alert(index);
    var sem = document.getElementById("tsubjects").options[index].getAttribute("data-sem");
document.getElementsByName("sem")[0].value = sem ;
}
</script>
</body>
</html>
<?php }  ?>