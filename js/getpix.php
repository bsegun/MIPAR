<?php

require_once("../../../../connect.php");
$appid = $_GET['appid'];
$sql = "SELECT passport from prospective where appid='$appid'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query)==1)){
	$row = mysqli_fetch_array($query);
	$p=$row['passport'];
	$passport = "<input type='hidden' id='passport' value='$p'><img src='../../../programmes/std/$p' style='height:200px; width:200px; float:right'>";
	echo $passport;
}

?>