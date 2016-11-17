<?php
require_once("../../../../connect.php");

if(isset($_GET['hid'])){
	$hid = trim($_GET['hid']);
	$sql = "delete from newsandevents where hid='$hid'";
	if($query = mysqli_query($con, $sql)){
		echo "done";
	}
}

?>