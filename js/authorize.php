<?php 
require_once("../../dbcon/dbcon.php");

$sql = "select * from application where status='Open'";

if(($query =mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
	$row = mysqli_fetch_array($query);
	$session = $row['session_year'];
	$type = $row['type'];
	echo "<br>
<h3 class='text-success' style='text-align:center'><i class='icon-info fa-3x'></i> Application is currently open for $session Session ($type)</h3>";
?><br>
									<center><button type='button' onclick='endapp();' style='' class='btn btn-primary btn-sm btn-line'><i class='fa fa-remove fa-spin'></i> End Application?</button></center>

<?php
}else{
	?>

	<h3 class='text-danger' style='text-align:center'><i class='icon-thumbs-down'></i> Admission currently closed</h3>
<form method='post' action=''>
	<fieldset>
		<legend>Open Application Here</legend>
		<div id='err' class='row text-danger' style='text-align: center'></div>
<div class="form-group clearfix" >
							Select Session:
									<select class='form-control' id='session'>
										<option value=''> -- Please Select -- </option>
										<?php 
										$year = date('Y', time());
										$start = $year+2;
										$stop = $year - 2;
										for ($i = $stop; $i<=$start; $i++){
											$sessionstart = $i+1;
											$session = "{$i}/{$sessionstart}";
											echo "<option value='$session'>$session Session</option>";
										}
										?>
									</select><br><br>
Application Type:
									<select class='form-control' id='type'>
										<option value=''> -- Please Select -- </option>
										<option value='Regular'>Regular</option>
										<option value='Late Form'>Late Form</option>
										
									</select>

																
									<center><br><br><button type='button' onclick='openapp();'  class='btn btn-warning btn-sm btn-line'><i class='icon-save'></i> Open Application</button></center>

																

	</fieldset>
</form>
</div>
	<?php
}

?>