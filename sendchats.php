<?php
session_start();
require_once '../dbcon/dbcon.php';
if(!isset($_SESSION['mat'])){
    ?>
<script>
    window.location.assign("index.php");
</script>
    <?php exit;
}else{
    $matric = $_SESSION['mat'];
    $sql = "select * from students where matric='$matric'";
    if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) ==1)){
$test_input = mysqli_fetch_array($query);


$sname = $test_input['sname'];
$onames = $test_input['onames'];
$matric = $test_input['matric'];
$clas = $test_input['clas'];
$email = $test_input['email'];
$upcode = $test_input['upcode'];

  }else{
?>
<script>
    window.location.assign("index.php");
</script>
    <?php
    exit;
    }
}

if(isset($_GET['comment'])){
$date = date("Y-m-d h:i:sa", time());
$comment = trim($_GET['comment']);
$sql = "insert into chats (matric, comment, dated) values(\"$matric\",\"$comment\",\"$date\");";
if($query = mysqli_query($con,$sql)){
require_once("curchats.php");
}else{
echo "Sorry, an unknown error occured";
}
}else{
echo "Sorry, an unknown error has occured";

}
?>
