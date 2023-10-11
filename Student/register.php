<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
	  $stname=$_POST['stname'];
	  $usn=$_POST['usn'];
	  $sem=$_POST['sem'];
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
$status='notverified';
$sql="insert into tblregister(stname,usn,sem,email,mobile,newpassword,status)values(:stname,:usn,:sem,:email,:mobile,:newpassword,:status)";
$query=$dbh->prepare($sql);
$query->bindParam(':stname',$stname,PDO::PARAM_STR);
$query->bindParam(':usn',$usn,PDO::PARAM_STR);
$query->bindParam(':sem',$sem,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':newpassword',$newpassword,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
 $query->execute();


   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Registered. Please Sigin")</script>';
echo "<script>window.location.href ='register.php'</script>";
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
    
    <title>Chatbot Register</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>

<body class="bg-dark" style=" background-image: url('images/alvas.jpg');background-repeat: no-repeat;
  background-size: 1400px 800px;">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                     <p class="login-img"><img class="headerc" src="images/header.jpg " style="max-width:550px;"></p>
                    <hr  color="red"/>
                </div>
                <div class="login-form" style="overflow:scroll;height:500px;">
                    <form action="" method="post" name="chngpwd" onSubmit="return valid();">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control"  required="" name="stname">
</div>
<div class="form-group">
<label>USN</label>
<input type="text" class="form-control"  required="" name="usn">
</div>
<div class="form-group">
<label>Semester</label>
<select type="text" name="sem" id="sem" value="" class="form-control" required="true">
<option value="">Choose Semester</option> 
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
</div>                       
<div class="form-group">
<label>Email Address</label>
<input type="email" class="form-control"  required="" name="email">
</div>

<div class="form-group">
<label>Mobile Number</label>
<input type="text" class="form-control"  name="mobile" required="true">
</div>
                        
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="newpassword" required="true"/>
</div>

<div class="form-group">
<label>Confirm Password</label>
<input class="form-control" type="password" name="confirmpassword" required="true" />
</div>


<center>
<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="background-color:#2d226c" name="submit">Register</button>
</center>
<div class="checkbox">
<center><label>
 <a href="index.php">SIGNIN</a>
 </label></center>
</div>
</form>

</div>
</div>
</div>
</div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
