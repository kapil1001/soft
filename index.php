<?php
$mysqli=new mysqli("localhost","root","","kapil");

//check connection
if($mysqli===false)
{
die("error:could not connect.".$mysqli->connect_error);
}
//escape user inputs for security
$full_name=$mysqli->real_escape_string($_REQUEST['full_name']);//avoids query injection
$email=$mysqli->real_escape_string($__REQUEST['Email']);
$address=$mysqli->real_escape_string($_REQUEST['Address']);
$phone=$mysqli->real_escape_string($_REQUEST['Phone']);
$date=$mysqli->real_escape_string($_REQUEST['Date']);
$photo=$mysqli->real_escape_string($_REQUEST['Photo']);
$gender=$mysqli->real_escape_string($_REQUEST['Gender']);
$student_details=$mysqli->real_escape_string($_REQUEST['Student_details']);

//insert into database
$sql="INSERT INTO students(Name values('$full_name','$Email','$Address','$Phone','$Date','$Photo','$Gender','$student_details');
if($mysqli->query($sql)===true)
{
	echo" Data sucessfully inserted";
	
}
else
{
	echo"error:could not execute $sql.".$mysqli->error;
	
}
//connection close
mysqli->close();

?>