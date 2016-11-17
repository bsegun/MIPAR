<?php 
require_once("../../../../connect.php");

$sql = "select email from prospective where adm_status='Not Admitted' ";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	
$no = mysqli_num_rows($query);
	$phone = "";
	while($row = mysqli_fetch_array($query)){
		$phone .= $row['email'].",";
	}
}else{
	echo '

                    <div class="alert alert-warning ">
                        Sorry, no application yet!  
                    </div> 
    ';
    exit;
}


echo "<div class='col-md-4 container well jumbotron' id='sections'><h4>Email(s) Found</h4><hr>
<textarea class='form-control'  style='height:300px' readonly id='sections'>$phone</textarea>
	</div>
		<div class='col-md-8'>
				<h3><center>$no Email(s) Ready!</center></h3>
				<hr>
				<textarea class='form-control'  style='height:300px' placeholder='Body of the Message'></textarea><br/>
				<br/>
				<button name='smssend' id='smssend' style='float:right' type='button'  class='btn btn-lg btn-success'>Send SMS <span class='glyphicon glyphicon-envelope'></span></button>
		</div>
	";
?>

