<?php
function getname($id){
	include("../../dbcon/dbcon.php");
	$sql = "select sname from regtable where user_id='$id'";
	if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
		$row = mysqli_fetch_array($query);
		return $row['sname'];
	}
}

function getemail($id){
	include("../../dbcon/dbcon.php");
	$sql = "select email from regtable where user_id='$id'";
	if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
		$row = mysqli_fetch_array($query);
		return $row['email'];
	}
}


if(isset($_GET['user_id'])){
	require("../../dbcon/dbcon.php");
$pass = strtoupper(generateRandomString());
$hpass = sha1($pass);
	$sql = "update regtable set def='Confirmed',changepass='Yes', password='$hpass', token='$pass' where user_id='".$_GET['user_id']."'";
	if($query = mysqli_query($con, $sql)){
		if(!file_exists("../../donation/".$_GET['user_id'])){
			mkdir("../../donation/".$_GET['user_id']);
		}
		echo "Confirmed";
		
		$name = getname($_GET['user_id']);
		$to = getemail($_GET['user_id']);



	$subject = "Registration Confirmed!!!";
	$message = "Dear $name, \n\nYour registration has been confirmed. You can now login our platform with your email. Your password is $pass \n\nThanks.\n \n MIA Team.";
	$headers = "From: benjamin.aribisala@lasu.edu.ng"."\r\n".
				"Reply-To: benjamin.aribisala@lasu.edu.ng"."\r\n".
				"X-Mailer: PHP/".phpversion();
				mail($to, $subject, $message, $headers);
	}
}



function generateRandomString($length = 6) {
    return strtoupper(substr(str_shuffle("123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ"), 0, $length));
}


?>