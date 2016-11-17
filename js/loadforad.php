<?php
require_once("../../../../connect.php");
$appid = $_GET['appid'];
$sql = "select * from prospective where appid = '$appid'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
	$row = mysqli_fetch_array($query);
	$sname = strtoupper($row['sname']);
	$mname = ucwords($row['mname']);
	$appid = ucwords($row['appid']);
	$lname = ucwords($row['fname']);
	$programme = ucwords($row['mode']);
	$passport = $row['passport'];
	$type = $row['type'];
	$score = $row['score'];
	$adm_status = $row['adm_status'];
	?><br/><br>
<div class='jumbotron'>
	<img src='../../../programmes/std/<?php echo $passport; ?>' style='height:200px; width:200px; float:right' class='img img-rounded' />
	<br/><input type='hidden' id='appid' value='<?php echo $appid; ?>'>
	<table class='table'>
		<tr><td>Name: </td><td><b><?php echo $sname; ?>,</b> <?php echo $mname; ?> <?php echo $lname; ?></td></tr>

		<tr><td>Application ID:</td><td><?php echo $appid; ?> </td></tr>
<tr><td>Type:</td><td><?php echo $type; ?> </td></tr>
<tr><td>Programme:</td><td><?php echo $programme; ?> </td></tr>

		<tr><td>Current Score: </td><td><b><?php echo $score+0; ?></b></td></tr>
<tr><td>Current Admission Status: </td><td><b><?php echo $adm_status; ?></td></tr>
<tr><td>Upload score: </td><td><input class='form-control' id='score' value="<?php echo $score+0; ?>" type='number' min='0' max='100' placeholder='Student screening score' /></td></tr>

<tr><td>Admission Status: </td><td>
<select id='adm' class='form-control'>
	<option value="">--Select Adm Status--</option>
	<option value="Admitted" <?php if($adm_status == "Admitted") echo "selected"; ?>>Admitted</option>
	<option value="Pending" <?php if($adm_status == "Pending") echo "selected"; ?>>Pending</option>
	<option value="Not Admitted" <?php if($adm_status == "Not Admitted") echo "selected"; ?>>Not Admitted</option>
	

</select>
</td></tr>


<tr><td></td><td><button class='btn btn-success' onclick='savestatus();' style='margin-right:20px;'><i class='fa fa-save'></i> Save Status</button>

<button class='btn btn-danger' onclick='admitprop();' style='float:right;'><i class='fa fa-info'></i> Close</button>
</td></tr>


	</table>
</div>
	<?php
}else{
	?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-remove'></i>ERROR: Record does not exist!</div></center>
	
	<?php
}

?>