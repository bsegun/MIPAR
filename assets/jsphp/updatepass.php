<?php
function getname($id){
    include("../../dbcon/dbcon.php");
    $sql = "select sname from regtable where email='$id'";
    if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
        $row = mysqli_fetch_array($query);
        return $row['sname'];
    }
}

function getemail($id){
    include("../../dbcon/dbcon.php");
    $sql = "select email from regtable where email='$id'";
    if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
        $row = mysqli_fetch_array($query);
        return $row['email'];
    }
}
if(isset($_GET['email']) && (isset($_GET['password']))){
	require_once("../../dbcon/dbcon.php");
	$sql = "update regtable set changepass='',password=sha1(\"".$_GET['password']."\") where email='".$_GET['email']."' ";
	if($query = mysqli_query($con, $sql)){


        $name = getname($_GET['email']);
        $to = getemail($_GET['email']);

    $subject = "Password Updated!!!";
    $message = "Dear $name, \n\nYour password has been changed successfully.\n\nThanks.\n \n MIA Team.";
    $headers = "From: benjamin.aribisala@lasu.edu.ng"."\r\n".
                "Reply-To: benjamin.aribisala@lasu.edu.ng"."\r\n".
                "X-Mailer: PHP/".phpversion();
            //  mail($to, $subject, $message, $headers);

		?>

<form method="post" action="" style="background:#fcfcfc" id='maininform'>
                              <center><img src="assets/img/avatar.jpg" style="height:50px; width:100px"></center><br/><br>
                            <div id="adderror" ><div class='alert alert success'><center><br><i class='fa fa-3x fa-check'></i><br>Password changed successfully, please login to continue!</center></div></div>


                            <div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size">E-mail:</label>
                            <div class="col-md-8">
                             <input style="border:0px; outline:0px" type="email" required class="form-control" name="email" id="email" placeholder="E-mail" />
                            </div>
                        </div>
                            <div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size">Password:</label>
                            <div class="col-md-8">
                             <input style="border:0px; outline:0px" class="form-control" type="password" required name="password" id="password" placeholder="**************" />
                            </div>
                        </div>
<div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size"></label>
                            <div class="col-md-8">
                             
<button onclick='login()' type="button"  class="btn btn-line btn-warning" style="float:right"><i class="fa fa-check"></i> Login</button>

                            </div>
                            <a href="#" onclick="forgotpass();" style="color:navy">Forgot your password?</a>
                        </div>


</form>


		<?php
	}
}else{
	?>

<div class='alert alert-warning'><center><i class='fa fa-remove fa-4x'></i><br> Error occured!</center></div>
	<?php
}


?>