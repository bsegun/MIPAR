<?php
require_once("../../dbcon/dbcon.php");
$sql = "update application set status='Closed' where status='Open'";

if($query =mysqli_query($con, $sql)){
	echo "Done";
}else{
	echo "Not done";
}


?>