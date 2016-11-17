<?php
require_once '../../dbcon/dbcon.php';
if(isset($_GET['title'])){

$sname = htmlentities(htmlspecialchars($_GET['sname']));
$onames = htmlentities(htmlspecialchars($_GET['onames']));
$profession = htmlentities(htmlspecialchars($_GET['profession']));
$research = htmlentities(htmlspecialchars($_GET['research']));
$university = htmlentities(htmlspecialchars($_GET['university']));
$phone = htmlentities(htmlspecialchars($_GET['phone']));
$email2 = htmlentities(htmlspecialchars($_GET['email2']));
$address = htmlentities(htmlspecialchars($_GET['address']));
$title = htmlentities(htmlspecialchars($_GET['title']));
$regdate = date("d-M-Y", time());

$sql = "INSERT into regtable(title, sname, onames, profession, research, phone, email, address,university, regdate, def) values(\"$title\", \"$sname\", \"$onames\", \"$profession\", \"$research\", \"$phone\", \"$email2\", \"$address\", \"$university\", \"$regdate\",'')";

if($query = mysqli_query($con, $sql)){
	$to = $email2;
	$subject = "Registration on MIA";
	$message = "Dear $sname, \n\nYour registration request was successfully received! Your password will be generated and sent to this email when your registration has been approved by the MIA team. \n\nThanks.\n \n MIA Team.";
	$headers = "From: benjamin.aribisala@lasu.edu.ng"."\r\n".
				"Reply-To: benjamin.aribisala@lasu.edu.ng"."\r\n".
				"X-Mailer: PHP/".phpversion();
				mail($to, $subject, $message, $headers);

	?>
<div class='alert alert-success'><center><i class='fa fa-check fa-4x'></i><br> Registration successful! Your password will be generated and sent to your email when your registration has been approved by the MIA team. Thanks.</center></div>


	<?php
}else{
	?>
<div class='alert alert-danger'><i class='fa fa-support'></i> This e-mail has been registered with us before, please login or use the forgot password menu in the login area</div>


	<?php
}

}else{
	?>
<div class='alert alert-danger'><i class='fa fa-thumbs-down'></i> Some errors in the registration form</div>

	<?php
}


?>