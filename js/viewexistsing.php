<div class="panel panel-default ">
                      <a href="#widget2container1" class="panel-heading" data-toggle="collapse">Year One</a>
                      <div id="widget2container1" class="panel-body collapse in">
                          <h2 class="home-heading">Year One Students</h2>
                          <p>

<?php

require_once("../../../../connect.php");

$sql = "select * from student_table where clas='Year One'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	?>
<table class='table'><tr style='background:maroon; color:white'>
	<td>S/NO</td>
	<td>STUDENT ID</td>
	<td>STUDENT NAME</td>
	<td>PASSPORT</td>
	<td>ACTION</td>

</tr>
	<?php

	$cc=0;
	while($row = mysqli_fetch_array($query)){
		$id = $row['id'];
			$stdid = $row['stdid'];
		$appid = $row['appid'];

		$name = "<b>".strtoupper($row['sname'])."</b>, ".ucwords($row['mname'])." ".ucwords($row['fname']);
		$passport = $row['passport'];
		$div = "{$passport}___{$id}";

		$cc++;
?>
	<tr>
	<td><?php echo $cc; ?></td>
	<td><?php echo $stdid; ?></td>
	<td><?php echo $name; ?></td>
	<td id='thepass<?php echo $id; ?>'><a href='#' onclick="viewp('<?php echo $div; ?>');"> View Passport</a>     </td>
	<td style='color:green'><a href='#' onclick="views('<?php echo $id; ?>')"> <i class='glyphicon glyphicon-remove'></i> Delete</a></td>

</tr>


<?php
	}

	?>
</table>

	<?php
}else{

?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: No student added yet!</div></center>
	

<?php

}

?>
                          </p>
                      </div>
                  </div>


<div class="panel panel-default ">
                      <a href="#widget2container11" class="panel-heading" data-toggle="collapse">Year Two</a>
                      <div id="widget2container11" class="panel-body collapse in">
                          <h2 class="home-heading">Year Two Students</h2>
                          <p>

<?php

require_once("../../../../connect.php");

$sql = "select * from student_table where clas='Year Two'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	?>
<table class='table'><tr style='background:maroon; color:white'>
	<td>S/NO</td>
	<td>STUDENT ID</td>
	<td>STUDENT NAME</td>
	<td>PASSPORT</td>
	<td>ACTION</td>

</tr>
	<?php

	$cc=0;
	while($row = mysqli_fetch_array($query)){
		$id = $row['id'];
			$stdid = $row['stdid'];
		$appid = $row['appid'];

		$name = "<b>".strtoupper($row['sname'])."</b>, ".ucwords($row['mname'])." ".ucwords($row['fname']);
		$passport = $row['passport'];
		$div = "{$passport}___{$id}";

		$cc++;
?>
	<tr>
	<td><?php echo $cc; ?></td>
	<td><?php echo $stdid; ?></td>
	<td><?php echo $name; ?></td>
	<td id='thepass<?php echo $id; ?>'><a href='#' onclick="viewp('<?php echo $div; ?>');"> View Passport</a>     </td>
	<td style='color:green'><a href='#' onclick="views('<?php echo $id; ?>')"> <i class='glyphicon glyphicon-remove'></i> Delete</a></td>

</tr>


<?php
	}

	?>
</table>

	<?php
}else{

?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: No student added yet!</div></center>
	

<?php

}

?>
                          </p>
                      </div>
                  </div>


<div class="panel panel-default ">
                      <a href="#widget2container111" class="panel-heading" data-toggle="collapse">Advance Diploma</a>
                      <div id="widget2container111" class="panel-body collapse in">
                          <h2 class="home-heading">Advance Diploma</h2>
                          <p>

<?php

require_once("../../../../connect.php");

$sql = "select * from student_table where clas='Advance'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	?>
<table class='table'><tr style='background:maroon; color:white'>
	<td>S/NO</td>
	<td>STUDENT ID</td>
	<td>STUDENT NAME</td>
	<td>PASSPORT</td>
	<td>ACTION</td>

</tr>
	<?php

	$cc=0;
	while($row = mysqli_fetch_array($query)){
		$id = $row['id'];
			$stdid = $row['stdid'];
		$appid = $row['appid'];

		$name = "<b>".strtoupper($row['sname'])."</b>, ".ucwords($row['mname'])." ".ucwords($row['fname']);
		$passport = $row['passport'];
		$div = "{$passport}___{$id}";

		$cc++;
?>
	<tr>
	<td><?php echo $cc; ?></td>
	<td><?php echo $stdid; ?></td>
	<td><?php echo $name; ?></td>
	<td id='thepass<?php echo $id; ?>'><a href='#' onclick="viewp('<?php echo $div; ?>');"> View Passport</a>     </td>
	<td style='color:green'><a href='#' onclick="views('<?php echo $id; ?>')"> <i class='glyphicon glyphicon-remove'></i> Delete</a></td>

</tr>


<?php
	}

	?>
</table>

	<?php
}else{

?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: No student added yet!</div></center>
	

<?php

}

?>
                          </p>
                      </div>
                  </div>


