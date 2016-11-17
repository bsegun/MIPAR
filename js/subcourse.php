<?php 
$ccode = $_GET['ccode'];
$ctitle = $_GET['ctitle'];
$cunit = $_GET['cunit'];
$clas = $_GET['clas'];



require_once("../../../../connect.php");


$sql = "insert into courses(ccode, cunit, ctitle, clas) values(\"$ccode\",\"$cunit\",\"$ctitle\",\"$clas\")";

if($query = mysqli_query($con, $sql)){
	echo "Done";

}else{
	echo $sql;
}

?>