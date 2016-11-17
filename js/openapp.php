<?php 
require_once("../../dbcon/dbcon.php");

$session = $_GET['session'];
$type = $_GET['type'];
$sql = "insert into application(session_year, type, status) values(\"$session\", \"$type\", \"Open\")";
if($query = mysqli_query($con, $sql)){
	echo "Done";

}else{
	echo "Error!";

}
?>