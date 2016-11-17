<?php
	require_once("../../../../connect.php");

	if(isset($_GET['data'])){
		$id = $_GET['data'];
		$sname = strtoupper(getit("sname", "prospective", "id", $id));
		$fname = ucwords(getit("fname", "prospective", "id", $id));
		$mname = ucwords(getit("mname", "prospective", "id", $id));
		$pass = ucwords(getit("passport", "prospective", "id", $id));

		$phone = getit("email", "prospective", "id", $id);
		}


		echo "<div class='col-md-3'>
&nbsp; -
		</div><div class='col-md-6 wals'>
		<h3>SEND E-MAIL to $sname</h3>
<form method='post' action=''>

<table class='table'>
<tr><td style='width:30%; text-align:right'></td><td style='font-weight:bold'><img style='width:100px; height:100px; float:right' class='img img-circle img-responsive' src='../../../programmes/std/$pass'></td></tr>
<tr><td style='width:30%; text-align:right'>Name:</td><td style='font-weight:bold'>$sname, $fname $mname</td></tr>
<tr><td style='width:30%; text-align:right'>Email:</td><td style='font-weight:bold'>$phone</td></tr>
<tr><td style='width:30%; text-align:right'>Subject:</td><td style='font-weight:bold'><input type='text' id='header' name='header' class='form-control' placeholder='Message heading...' maxlength='20' /></td></tr>

<tr><td style='width:30%; text-align:right'>Body of Message:</td><td style='font-weight:bold'><textarea  name='body' id='body' style='height:200px' class='form-control'></textarea>

<br/>
				<button type='button' class='btn btn-xs btn-primary' style='float:right'>Confirm Send <span class='glyphicon glyphicon-ok'></span></button>
</td></tr>

</table>
</form>
		</div>


		<div class='col-md-3'>&nbsp; -</div>";
			




function getit($parameter, $table, $uniquefield, $uniquevalue){
	include("../../../../connect.php");
	$sql = "select $parameter from $table where $uniquefield='$uniquevalue' ";
	if(($query = (mysqli_query($con, $sql)))  && (mysqli_num_rows($query) == 1)){
		$row = mysqli_fetch_array($query);
		return $row[$parameter];
	}else{
		return "nodata";
	}
}
?>