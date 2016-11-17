<?php
require_once("../../../../connect.php");

$sql = "select * from prospective where adm_status='Admitted' order by mode desc, gender desc";

if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) >0)){
	$noc = mysqli_num_rows($query);
echo "<div id='contdiv' class='row'></div><br/><br/>
<h3>$noc Applicants Found!</h3><hr>
<table class='table table-bordered table-responsive'>

<tr style='border:0px'>
<td></td>
	<td></td>
	<td></td>

	<td></td>
<td><a href='#' onclick=\"smsallad()\"><span class='glyphicon glyphicon-envelope'></span>Text All</a></td>
<td><a href='#' onclick=\"mailallad()\"><span class='glyphicon glyphicon-inbox'></span>Mail All</a></td>
<td><a href='#' onclick=\"dallad()\"><span class='glyphicon glyphicon-download'></span>Dowload All</a></td>
		</tr>

<tr style='color:white; background-color:black'>


	<td>S/N</td>
	<td>FULL NAME</td>
	<td>SEX</td>
	<td>MODE</td>
<td>STATUS</td>
<td>SMS</td>
<td>MAIL</td>
<td>VIEW</td>

</tr>"; $cc=0;
	while($row = mysqli_fetch_array($query)){$cc++;
		$id = strtoupper($row['id']);
		$hid = strtoupper($row['hid']);
		$sname = strtoupper($row['sname']);
		$fname = ucwords($row['fname']);
		$adm = ucwords($row['adm_status']);
		$mname = ucwords($row['mname']);
		$mode = $row['mode'];
		$gender = $row['gender'];
		$email = $row['email'];
		echo "<tr>
<td>$cc</td>
	<td>$sname, $fname $mname</td>
	<td>$gender</td>
<td>$mode</td>
<td>$adm</td>

	

<td><a href='#' onclick=\"smssingle('$id')\"><span class='glyphicon glyphicon-envelope'></span>Send SMS</a></td>
<td><a href='#' onclick=\"mailsingle('$id')\"><span class='glyphicon glyphicon-qrcode'></span>Send Mail</a></td>
<td><a href='#' onclick=\"viewsingle('$hid')\"><span class='glyphicon glyphicon-eye-open'></span>View Info</a></td>
		</tr>";
	}
	echo "
</table>
	";
}else{
	echo '

                    <div class="alert alert-warning ">
                       Nil!  
                    </div> 
    ';

}



?>