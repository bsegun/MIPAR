<?php
session_start();
$id = $_GET['id'];
include("../../dbcon/dbcon.php");
$anatomy = $_SESSION['anatomy'];
$type = $_SESSION['type'];

$sql = "select * from donation where anatomy='$anatomy' and imgtype='$type' and id<'$id'  order by id desc limit 10";
if(($qr = mysqli_query($con, $sql))&&(mysqli_num_rows($qr)>0)){
		
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
		
}else{
	echo "end";
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

?>