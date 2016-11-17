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

  }
}

include('../dbcon/dbcon.php');
function getname($matric){
include '../dbcon/dbcon.php';
$sql = "SELECT sname, onames from students where matric='$matric'";
if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query)==1)){
$row = mysqli_fetch_array($query);
return $row['sname']." ".$row['onames'];
}


}

                            $sql = "select * from chats order by id desc limit 50 ";
                            if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) >0)){
                                while($row = mysqli_fetch_array($query)){
                                    $mat = $row['matric'];
                                    $fullname = getname($mat);
                                    $content = nl2br($row['comment']);
                                    $date = $row['dated'];
                                     if($mat == $_SESSION['mat']){
?>

                                    <li style='padding: 10px' class="success right clearfix">
                                        <span class="chat-img pull-right">
                                                 <img src="http://www.xsignia.com/returningstudents/images/stud_image/<?php echo $mat; ?>.jpg" alt="User Avatar" class="img-circle" style='width:50px; height:50px' />
                                        </span>
                                        <div class="chat-body clearfix" class='col-md-6 col-xs-12' >
                                            <div class="header">
                                                <small class=" text-muted" style='background-color:white; color:black'>
                                                    <i class="icon-time" ></i> <?php echo $date; ?></small>
                                                <strong class="pull-right primary-font">Me</strong>
                                            </div>
                                            <br />
                                             <p><div class='col-md-6 col-xs-12'  style='text-align: right;float:right; background-color: green; color:white'> <?php echo $content; ?></div></p>
                                        </div>
                                    </li>
                                   
<?php
                                     }else{
?>
 <li class="left clearfix" style='padding: 10px'>
                                        <span class="chat-img pull-left">
                                            <img src="http://www.xsignia.com/returningstudents/images/stud_image/<?php echo $mat; ?>.jpg" alt="User Avatar" class="img-circle" style='width:50px; height:50px' />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">  <?php echo $fullname; ?> </strong>
                                                <small class="pull-right text-muted" style='background-color:maroon; color:white'>
                                                    <i class="icon-time"></i>  <?php echo $date; ?>
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                               <div class='col-md-6 col-xs-12' style='background:maroon; color:white'> <?php echo $content; ?></div>
                                            </p>
                                        </div>
                                    </li>
                                   

<?php
                                     }
                                }


                                   
                            }else{
                                ?>

                                <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/img/1.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                               
                                            </div>
                                             <br />
                                            <p>
                                                Post something to start chat...</p>
                                        </div>
                                    </li>
                                   
                                <?php
                            }
                        ?>
                        




