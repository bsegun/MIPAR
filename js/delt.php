<?php
require_once("../../../../connect.php");

if(isset($_GET['hid'])){
	$hid = trim($_GET['hid']);
	$sql = "delete from team_members where id='$hid'";
	if($query = mysqli_query($con, $sql)){
		echo "done";
	}
}

?>