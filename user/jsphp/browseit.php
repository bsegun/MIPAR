<?php session_start(); ?>
<div>
<?php
include("../../dbcon/dbcon.php");
$anatomy = $_GET['anatomy'];
$type = $_GET['type'];

$_SESSION['anatomy'] = $anatomy;

$_SESSION['type'] = $type;
function url_exists($url) {
    if (!$fp = curl_init($url)) return false;
    return true;
}
 
$sql = "select * from donation where anatomy='$anatomy' and imgtype='$type' order by id desc limit 10";
if(($qr = mysqli_query($con, $sql))&&(mysqli_num_rows($qr)>0)){
		echo "<h3>$type	/ $anatomy</h3><div class='table-responsive'><table id='myTable' class='table table-hover table-bordered' style='background:white'><thead>
<tr>
<th><i class='icon-home'></i> University of Donation</th>
<th><i class='icon-save'></i> Download</th>
<th><i class='icon-calendar'></i> Date Uploaded</th>
</tr>
		</thead><tbody>";
		while($row = mysqli_fetch_array($qr)){
				$uni = getuni($row['user_id']);
				$ci = $row['stamp'];
				$dat = $row['dated'];
				$link = getlink($ci);
				$id=$row['id'];

echo "<tr>
<td>$uni</td>
<td><a href='$link'>Download</a></td>
<td>$dat</td>

				</tr>";

				
		}
		echo "</tbody></table></div><div id='load'><h3 style='cursor:pointer; text-align:center' onclick=\"loaded('$id')\"><i class='icon-refresh'></i> Load more</h3></div>";
}else{
	echo "<div class='alert alert-danger'><center>No image found in selected category! <a href='#' onclick='downloadx()'>Click here to return</a></center></div>";
}



function getuni($data){
include("../../dbcon/dbcon.php");
$qr = "select university from regtable where user_id='$data'";
if(($qtr = mysqli_query($con, $qr))&&(mysqli_num_rows($qtr)==1)){
		$r = mysqli_fetch_array($qtr);
		return	$r['university'];
} 
}


function getlink($ci){
		$url3 = "https://oar.sci-gaia.eu/search?p=doi:10.15169/sci-gaia:{$ci}&of=xm";
		$return =  curlfunction($url3);
		 $c = explode("http://oar", $return);
		 $d = $c[1];
		$e = explode('</subfield>', $d);
		 return "http://oar".$e[0];
}




function curlfunction($url){
	$chandle = curl_init();
	curl_setopt($chandle, CURLOPT_URL, $url);
	curl_setopt($chandle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($chandle, CURLOPT_CONNECTTIMEOUT, 75);
	curl_setopt($chandle, CURLOPT_SSL_VERIFYPEER, 'off');
	//curl_setopt($chandle, CURLOPT_CAINFO, 'E:\path\to\curl-ca-bundle.crt');

	$curlres = curl_exec($chandle);

	curl_close($chandle);
	return $curlres;
}

?></div>