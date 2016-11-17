<?php

require_once("../../../../connect.php");
$id = $_GET['id'];
$sql = "delete from courses where id='$id'";
if($query = mysqli_query($con, $sql)){
	echo "Done";
}else{
	echo "not done";
}

?>