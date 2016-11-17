<?php
require_once("../../dbcon/dbcon.php");
if($_GET['status']==''){
$condition = "where def='".$_GET['status']."'";
$sql = "select * from regtable $condition  order by user_id desc";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) >0)){
	$noc = mysqli_num_rows($query);
echo "<div id='contdiv' class='row'></div><br/><br/>
<h3>$noc Pending Registration Request Found!</h3><hr>
<table class='table table-bordered table-responsive'>


<tr style='color:white; background-color:black'>


	<td>S/N</td>
	<td>FULL NAME</td>
	<td>REG DATE</td>
	<td>PROFESSION</td>
<td>VIEW</td><td>REJECT</td>

<td>CONFIRM</td>

</tr>"; $cc=0;
	while($row = mysqli_fetch_array($query)){$cc++;
		$id = strtoupper($row['user_id']);
		//$hid = strtoupper($row['happid']);
		$sname = strtoupper($row['sname']);
		$onames = ucwords($row['onames']);
		$regdate = ucwords($row['regdate']);
		$title = ucwords($row['title']);
		$profession = ucwords($row['profession']);
		$university = $row['university'];
		
		echo "<tr>
<td>$cc</td>
	<td>$title $sname, $onames</td>
	<td>$regdate</td>
<td>$profession</td>

	
<td><a href='#' style='color:navy' data-toggle=\"modal\" data-target=\"#auth\" onclick=\"viewsingle('$id')\"><span class='glyphicon glyphicon-eye-open'></span>View Info</a></td>
	
<td id='rejuser$id'><a href='#' style='color:maroon' onclick=\"rej('$id')\"><span class='icon-thumbs-down'></span>Reject</a></td>
	<td id='confuser$id'><a href='#' style='color:green' onclick=\"confirmit('$id')\"><span class='icon-check'></span>Confirm</a></td>
</tr>";
	}
	echo "
</table>
	";
}else{
	echo '

                    <div class="alert alert-warning ">
                         Nothing to display yet!  
                    </div> 
    ';

}
}else if($_GET['status']=="Confirmed"){


$condition = "where def='".$_GET['status']."'";
$sql = "select * from regtable $condition  order by user_id desc";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) >0)){
	$noc = mysqli_num_rows($query);
echo "<div id='contdiv' class='row'></div><br/><br/>
<h3>$noc Approved Users Found!</h3><hr>
<table class='table table-bordered table-responsive'>


<tr style='color:white; background-color:black'>


	<td>S/N</td>
	<td>FULL NAME</td>
	<td>REG DATE</td>
	<td>PROFESSION</td>
<td>VIEW</td><td>REJECT</td>

<td></td>

</tr>"; $cc=0;
	while($row = mysqli_fetch_array($query)){$cc++;
		$id = strtoupper($row['user_id']);
		//$hid = strtoupper($row['happid']);
		$sname = strtoupper($row['sname']);
		$onames = ucwords($row['onames']);
		$regdate = ucwords($row['regdate']);
		$title = ucwords($row['title']);
		$profession = ucwords($row['profession']);
		
		echo "<tr>
<td>$cc</td>
	<td>$title $sname, $onames</td>
	<td>$regdate</td>
<td>$profession</td>

	
<td><a href='#' style='color:navy' data-toggle=\"modal\" data-target=\"#auth\" onclick=\"viewsingle('$id')\"><span class='glyphicon glyphicon-eye-open'></span>View Info</a></td>
	
<td id='rejuser$id'><a href='#' style='color:maroon' onclick=\"rej('$id')\"><span class='icon-thumbs-down'></span>Reject</a></td>
	<td id='confuser$id'></td>
</tr>";
	}
	echo "
</table>
	";
}else{
	echo '

                    <div class="alert alert-warning ">
                         Nothing to display yet!  
                    </div> 
    ';

}




}else if($_GET['status']=="Cancelled"){



$condition = "where def='".$_GET['status']."'";
$sql = "select * from regtable $condition  order by user_id desc";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) >0)){
	$noc = mysqli_num_rows($query);
echo "<div id='contdiv' class='row'></div><br/><br/>
<h3>$noc Blocked Users Found!</h3><hr>
<table class='table table-bordered table-responsive'>


<tr style='color:white; background-color:black'>


	<td>S/N</td>
	<td>FULL NAME</td>
	<td>REG DATE</td>
	<td>PROFESSION</td>
<td>VIEW</td><td></td>

<td>CONFIRM</td>

</tr>"; $cc=0;
	while($row = mysqli_fetch_array($query)){$cc++;
		$id = strtoupper($row['user_id']);
		//$hid = strtoupper($row['happid']);
		$sname = strtoupper($row['sname']);
		$onames = ucwords($row['onames']);
		$regdate = ucwords($row['regdate']);
		$title = ucwords($row['title']);
		$profession = ucwords($row['profession']);
		
		echo "<tr>
<td>$cc</td>
	<td>$title $sname, $onames</td>
	<td>$regdate</td>
<td>$profession</td>

	
<td><a href='#' style='color:navy' data-toggle=\"modal\" data-target=\"#auth\" onclick=\"viewsingle('$id')\"><span class='glyphicon glyphicon-eye-open'></span>View Info</a></td>
	
<td id='rejuser$id'></td>
	<td id='confuser$id'><a href='#' style='color:green' onclick=\"confirmit('$id')\"><span class='icon-check'></span>Confirm</a></td>
</tr>";
	}
	echo "
</table>
	";
}else{
	echo '

                    <div class="alert alert-warning ">
                         Nothing to display yet!  
                    </div> 
    ';

}








}


?>