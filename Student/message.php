<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "trms") or die("Database Error");
include('includes/dbconnection.php');
// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

$sql="insert into tblchatbot(queries)values(:getMesg)";
$query=$dbh->prepare($sql);
$query->bindParam(':getMesg',$getMesg,PDO::PARAM_STR);

 $query->execute();


// execute python code here

$command = escapeshellcmd('python test_chatbot.py');
      $output = shell_exec($command);
		echo $output;

//checking user query to database query
$check_data = "SELECT replies FROM tblchatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand ,Can you please try with other -- keywords!";
}

?>