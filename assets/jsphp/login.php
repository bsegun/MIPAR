<?php
session_start();
if(isset($_GET['username']) && isset($_GET['password'])){
	$email = htmlentities(htmlspecialchars($_GET['username']));
	$password = htmlentities(htmlspecialchars($_GET['password']));
	$sql = "select * from regtable where email=\"$email\" and password=sha1(\"$password\")";
	require_once("../../dbcon/dbcon.php");
	if(($query=mysqli_query($con, $sql)) && (mysqli_num_rows($query) == 1)){
		$row = mysqli_fetch_array($query);
		if($row['changepass'] != "Yes"){
			$_SESSION['reguser'] = $email;
echo "success";
		}else{
			?>
			<h3>Welcome <?php echo $row['sname']; ?>!</h3><div class='divider'></div>
			Please change your password:

<input type='hidden' value='<?php echo $row['email']; ?>' id='user'/>
			<div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size"></label>
                            <div class="col-md-8" id='updateerror'>
                            
                            </div>
                        </div>

			<div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size">New Password:</label>
                            <div class="col-md-8">
                             <input onkeyup="this.value=this.value.trim()"  style="border:0px; outline:0px" class="form-control" type="password" required name="password1" id="password1" placeholder="**************" />
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size">Confirm New Password:</label>
                            <div class="col-md-8">
                             <input style="border:0px; outline:0px" class="form-control" onkeyup="this.value=this.value.trim()"  type="password" required name="password2" id="password2" placeholder="**************" />
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label" for="project_size"></label>
                            <div class="col-md-8">
                               
<button onclick='updatepass()' type="button"  class="btn btn-line btn-warning" style="float:right"><i class="fa fa-check"></i> Update Password</button>

                            </div>
                        </div>
			<?php
		}
	}else{
		?>
<div class='alert alert-danger'><i class='fa fa-thumbs-down'></i> Invalid username / password </div>
		<?php

	}

}else{
	echo "unhandled error has occured!";

}

?>