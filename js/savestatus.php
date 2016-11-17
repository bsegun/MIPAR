<?php

require_once("../../../../connect.php");

$appid = $_GET['appid'];
$score = $_GET['score'];
$status = $_GET['status'];

$sql = "update prospective set score='$score', adm_status='$status' where appid='$appid' ";

if($query = mysqli_query($con, $sql)){
	echo "Done";

}else{
	echo "not done";
}

?>