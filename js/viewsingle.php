<?php
if(isset($_GET['hid'])){
	//echo "<a href='#' onclick='closeview()' style='float:right'><span class='glyphicon glyphicon-remove'></span> Close</a><hr/><iframe style='height:500px; width:100%' src='../printengine/examples/oustpart.php?appid=".trim($_GET['hid'])."'></iframe>";


	require_once("../../dbcon/dbcon.php");
	$sql = "SELECT * from regtable where user_id='".$_GET['hid']."' ";
	if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query)==1)){
		$row = mysqli_fetch_array($query);
		?>

		<center><span style='color:gold; background-color: navy; padding:10px'><i class='icon-info'></i>User Information Loaded!</span><br>

		</center>

<table class='table'>
	<tr><td>Name: </td><td style='font-weight: bold'><?php echo $row['title']; ?>, <?php echo $row['sname']; ?> <?php echo $row['onames']; ?></td></tr>	<tr><td>Email:</td><td style='font-weight: bold'><?php echo $row['email']; ?></td></tr>
	<tr><td>Profession</td><td style='font-weight: bold'><?php echo $row['profession']; ?></td></tr>
<tr><td>Research Areas</td><td style='font-weight: bold'><?php echo $row['research']; ?>  </td></tr>
<tr><td>University of Affiliation</td><td style='font-weight: bold'><?php echo $row['university']; ?>  </td></tr>
<tr><td>Phone Number</td><td style='font-weight: bold'><?php echo $row['phone']; ?></td></tr>
<tr><td>Address: </td><td style='font-weight: bold'><?php echo $row['address']; ?></td></tr>

</table>
		<?php
	}else{
		echo "<span style='color:gold'><i class='icon-info'></i> Student Information not loaded!</span>";
	}
}


?>