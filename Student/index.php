<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $newpassword=md5($_POST['newpassword']);
    $sql ="SELECT id FROM tblregister WHERE email=:email and newpassword=:newpassword and status='verified'";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['trmsaid']=$result->id;
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='../index.php'; </script>";
} else{
echo "<script>alert('Invalid Details or Student not verified!');</script>";
}
}

?>
    
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>CHATBOT Student Login</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark" style=" background-image: url('images/alvas.jpg');background-repeat: no-repeat;
  background-size: 1400px 800px;">


    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    
					
					<p class="login-img"><img class="headerc" src="images/header.jpg " style="max-width:550px;"></p>
					
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="login">
					<center>
                         <p class="login-img"><img src="images/alvas-org-logo.png" style="width:100px"></p>
						 </center>
                        <div class="form-group">
                           <!-- <label>User Name</label>-->
                            <input type="email" class="form-control" placeholder="Email" required="true" name="email">
                        </div>
                            <div class="form-group">
                               <!-- <label>Password</label>-->
                                <input type="password" class="form-control" placeholder="Password" name="newpassword" required="true">
                        </div>
                                <div class="checkbox">
                                    <label class="pull-left">
                                <a href="register.php" style="padding-left: 80px">Register</a>
                                    
                                <a href="forgot-password.php" style="padding-left: 150px">Forgot Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="background-color:#2d226c" name="login">Sign in</button> <button type="reset" class="btn btn-success btn-flat m-b-30 m-t-30" style="background-color:#2d226c" name="reset">Reset</button>
								
                                
                            
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