<?php
session_start();
require_once("../dbcon/dbcon.php");
if(!isset($_SESSION['admaccess'])){
  //
}else{
  session_destroy();
}
$sname=$onames=$matric=$clas=$email=$p1=$p2=$error='';


if(isset($_POST['stdlogin'])){
  $matric = test_input($_POST['admuser']);
   $password = test_input($_POST['admpass']);

  $sql = "select * from login_access where username='$matric' and password=sha1('$password')";

  if(($query = mysqli_query($con, $sql)) &&(mysqli_num_rows($query) == 1)){
    $row = mysqli_fetch_array($query);
    $_SESSION['admaccess']=$matric;
    
    $fname = "Welcome administrator. Please ensure to log out when you are done!";
    ?>

<script>
  alert("Welcome administrator. Please ensure to log out when you are done!");
  window.location.assign("admin.php");
</script>
    <?php
  }else{
     $error = "<div class='alert alert-danger'><strong>SIGN-IN</strong> <i>Invalid username or/and password!</i></div>";
  }
}


function test_input($data){
  $data=trim($data);
  $data=htmlentities($data);
  $data=htmlspecialchars($data);
 // return preg_filter('/[^A-Za-z0-9\-]/', '', $data);
return $data;
}
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>MIA | Admin Access</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="all/bootstrap.css" />
    <link rel="stylesheet" href="all/login.css" />
    <link rel="stylesheet" href="assets/css/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
     <style type="text/css">
      body {
    overflow: hidden;
}

/* Preloader */

#preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:#fff; /* change if the mask should have another color then white */
    z-index:99; /* makes sure it stays on top */
}

#status {
    width:200px;
    height:200px;
    position:absolute;
    left:50%; /* centers the loading animation horizontally one the screen */
    top:50%; /* centers the loading animation vertically one the screen */
    background-image:url(../assets/img/loading8.gif); /* path to your loading animation */
    background-repeat:no-repeat;
    background-position:center;
    margin:-100px 0 0 -100px; /* is width and height divided by two */
}


    </style>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body style=" background-image: url('../assets/img/mia.png')">
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center"><br><br><br><br>
       <img src="../assets/img/lasu.jpg" style="width:100px;height:100px">
       </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="" method="post" class="form-signin">
                <p class="text-muted text-center" style="background:navy; color:gold">
                    Admin Login
                </p>
                <br>
<?php echo $error; ?>
                
                <input max="15" style="border:0px; outline:0px; background:gold; color:navy;" name="admuser" onkeyup="this.value=this.value.trim();" required type="text"  placeholder="Username" class="form-control" />
                <input style="border:0px; outline:0px; background:gold; color:navy;" required name="admpass" onkeyup="this.value=this.value.trim();" type="password" placeholder="********" class="form-control" />
                <button  name="stdlogin" class="btn btn-line text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
        
        
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
           <li><a class="text-muted" href="../" ><i class="fa fa-home"></i> Back Home</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="all/jquery-2.0.3.min.js"></script>
      <script src="all/bootstrap.js"></script>
   <script src="all/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>



<script type="text/javascript">
  function valpass(){
var p1 = document.getElementById('p1').value;
var p2 = document.getElementById('p2').value;

if(p1 != p2){
alert("ERROR: The supplied passwords do not match");
return false;
  }else{
    if(p1.length<6){
   alert("ERROR: Chosen password too short!");

   return false;
    }
  }
}
</script>

<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
<?php 

?>