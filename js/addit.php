<?php

require_once("../../../../connect.php");
$appid = $_GET['appid'];
$stdid = $_GET['stdid'];
$sname = $_GET['sname'];
$passport = $_GET['passport'];
$fname = $_GET['fname'];
$mname = $_GET['mname'];
$sex = $_GET['sex'];
$class = $_GET['class'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$email = $_GET['email'];

$sql = "INSERT into student_table(stdid, appid,passport, sname, mname, fname, clas, phone, address, sex, email) values(\"$stdid\",\"$appid\",\"$passport\",\"$sname\",\"$mname\",\"$fname\",\"$class\",\"$phone\",\"$address\",\"$sex\",\"$email\")";
if($query = mysqli_query($con, $sql)){
	echo "Done";
}else{
	echo "Not done";
}

?>