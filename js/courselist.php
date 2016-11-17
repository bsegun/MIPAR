    <div class="panel panel-default ">
                      <a href="#widget2container" class="panel-heading" data-toggle="collapse">Year One</a>
                      <div id="widget2container" class="panel-body collapse in">
                          <h2 class="home-heading">Year One Courses</h2>
                          <p>

<?php

require_once("../../../../connect.php");

$sql = "select * from courses where clas='Year One'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	?>
<table class='table'><tr style='background:maroon; color:white'>
	<td>S/NO</td>
	<td>COURSE CODE</td>
	<td>COURSE TITLE</td>
	<td>UNITS</td>
	<td>ACTION</td>

</tr>
	<?php

	$cc=0;
	while($row = mysqli_fetch_array($query)){
		$id = $row['id'];
			$ccode = $row['ccode'];
		$ctitle = $row['ctitle'];
		$cunit = $row['cunit'];
		$cc++;
?>
	<tr>
	<td><?php echo $cc; ?></td>
	<td><?php echo $ccode; ?></td>
	<td><?php echo $ctitle; ?></td>
	<td><?php echo $cunit; ?></td>
	<td style='color:red'><a href='#' onclick="delcourse('<?php echo $id; ?>')"> <i class='glyphicon glyphicon-remove'></i> Delete</a></td>

</tr>


<?php
	}

	?>
</table>

	<?php
}else{

?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: No courses added yet!</div></center>
	

<?php

}

?>
                          </p>
                      </div>
                  </div>



                      <div class="panel panel-default ">
                      <a href="#widget2containerd" class="panel-heading" data-toggle="collapse">Year One</a>
                      <div id="widget2containerd" class="panel-body collapse in">
                          <h2 class="home-heading">Year Two Courses</h2>
                          <p>

<?php

require_once("../../../../connect.php");

$sql = "select * from courses where clas='Year Two'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	?>
<table class='table'><tr style='background:maroon; color:white'>
	<td>S/NO</td>
	<td>COURSE CODE</td>
	<td>COURSE TITLE</td>
	<td>UNITS</td>
	<td>ACTION</td>

</tr>
	<?php

	$cc=0;
	while($row = mysqli_fetch_array($query)){
		$id = $row['id'];
			$ccode = $row['ccode'];
		$ctitle = $row['ctitle'];
		$cunit = $row['cunit'];
		$cc++;
?>
	<tr>
	<td><?php echo $cc; ?></td>
	<td><?php echo $ccode; ?></td>
	<td><?php echo $ctitle; ?></td>
	<td><?php echo $cunit; ?></td>
	<td style='color:red'><a href='#' onclick="delcourse('<?php echo $id; ?>')"> <i class='glyphicon glyphicon-remove'></i> Delete</a></td>

</tr>


<?php
	}

	?>
</table>

	<?php
}else{

?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: No courses added yet!</div></center>
	

<?php

}

?>
               

                          </p>
                      </div>
                  </div>



    <div class="panel panel-default ">
                      <a href="#widget2containers" class="panel-heading" data-toggle="collapse">Advance Diploma</a>
                      <div id="widget2containers" class="panel-body collapse in">
                          <h2 class="home-heading">Advance Diploma</h2>
                          <p>


<?php

require_once("../../../../connect.php");

$sql = "select * from courses where clas='Advance'";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	?>
<table class='table'><tr style='background:maroon; color:white'>
	<td>S/NO</td>
	<td>COURSE CODE</td>
	<td>COURSE TITLE</td>
	<td>UNITS</td>
	<td>ACTION</td>

</tr>
	<?php

	$cc=0;
	while($row = mysqli_fetch_array($query)){
		$id = $row['id'];
			$ccode = $row['ccode'];
		$ctitle = $row['ctitle'];
		$cunit = $row['cunit'];
		$cc++;
?>
	<tr>
	<td><?php echo $cc; ?></td>
	<td><?php echo $ccode; ?></td>
	<td><?php echo $ctitle; ?></td>
	<td><?php echo $cunit; ?></td>
	<td style='color:red'><a href='#' onclick="delcourse('<?php echo $id; ?>')"> <i class='glyphicon glyphicon-remove'></i> Delete</a></td>

</tr>


<?php
	}

	?>
</table>

	<?php
}else{

?>
<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: No courses added yet!</div></center>
	

<?php

}

?>
               
                          </p>
                      </div>
                  </div>



                  