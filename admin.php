<?php
session_start();
include '../dbcon/dbcon.php';
if(!isset($_SESSION['admaccess'])){
    ?>
<script>
    window.location.assign("index.php");
</script>
    <?php
    exit;
}



if(isset($_POST['subnews'])){
  $title = trim($_POST['title']);
  $caption = trim($_POST['caption']);
  $body = trim($_POST['body']);
  if((isset($_FILES['upload']['name']))&&($_FILES['upload']['name'] != '')){
    $name = $_FILES['upload']['name'];
    $temp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];

    if($type == "image/jpg" || $type == "image/jpeg" || $type=="image/png"){
        $passport = $name;
 move_uploaded_file($temp, "../news/newsbanner/$name");
    }else{
      $passport = '';
    }
  }else{
    $passport = "";
  }

$date = date('d', time());
$month = date('M', time());
$year = date('Y', time());
$time = time();
$hid = sha1($time);
  $sql = "insert into newsandevents(hid, title, body, caption, passport, date, month, year) values(\"$hid\",\"$title\", \"$body\", \"$caption\", \"$passport\", \"$date\", \"$month\", \"$year\" )";
  if($query = mysqli_query($con, $sql)){
    
   
 ?>
<script>
  alert("News upload successful!");
  window.location.assign("admin.php");
</script>
    <?php
  }else{
    ?>
<script>
  alert("Sorry, an unknown error occured!");
  window.location.assign("admin.php");
</script>
    <?php
  }
}






if(isset($_POST['addteam'])){
  $fname = trim($_POST['fname']);
  $caption = trim($_POST['caption']);
  $role = trim($_POST['role']);
$bio = trim($_POST['bio']);
$cat = trim($_POST['cat']);
$designation = trim($_POST['designation']);
$qua = trim($_POST['qua']);
$area = trim($_POST['area']);

  //links
 $fb = trim($_POST['fb']);
  $twitter = trim($_POST['twitter']);
  $insta = trim($_POST['insta']);
  $skype = trim($_POST['skype']);
  $gplus = trim($_POST['gplus']);
 

  if((isset($_FILES['upload']['name']))&&($_FILES['upload']['name'] != '')){
    $name = $_FILES['upload']['name'];
    $temp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];

    if($type == "image/jpg" || $type == "image/jpeg" || $type=="image/png"){
        $passport = $name;
        move_uploaded_file($temp, "../images/team/$name");
    }else{
      $passport = '';
    }
  }else{
    $passport = "";
  }

  $sql = "insert into team_members(fname, bio, caption,cat, role, gplus, fb, twitter, insta, skype, passport, designation, qua, area) values(\"$fname\",\"$bio\",\"$caption\",\"$cat\", \"$role\", \"$gplus\", \"$fb\", \"$twitter\", \"$insta\", \"$skype\", \"$passport\" , \"$designation\" , \"$qua\" , \"$area\" )";
  if($query = mysqli_query($con, $sql)){
    
   
 ?>
<script>
  alert("New team added!");
  window.location.assign("admin.php");
</script>
    <?php
  }else{
    ?>
<script>
  alert("Sorry, an unknown error occured!");
 // window.location.assign("index.php");
</script>
    <?php
    echo $sql;
  }
}
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>MIA | Admin Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
    <!-- END PAGE LEVEL  STYLES -->
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
    background-image:url(../assets/img/loader.gif); /* path to your loading animation */
    background-repeat:no-repeat;
    background-position:center;
    margin:-100px 0 0 -100px; /* is width and height divided by two */
}
    </style>
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " style="background:rgb(6, 33, 63);;">
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
    <!-- MAIN WRAPPER -->
    <div id="wrap" style="background-image: url('../images/main-bg.jpg');">
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style=";background:rgb(6, 33, 63);">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header" >

                    <a class="navbar-brand" href="index.php" style="font-family:candara; color:black">
<img src="../assets/img/mia.png" style="width:100%; height:60px" /> 
                    </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right" style="font-family:Exo 2">


                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; User Settings Menu<i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a  href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img style="width:70px; height:70px" class="media-object img-circle user-img" alt="Admin Picture" src="../assets/img/lasu.jpg" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading">Admin</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel active">
                    <a href="admin.php" >
                        <i class="icon-dashboard"></i> Dashboard
	   
                       
                    </a>                   
                </li>



                <li class="panel active">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-navux">
                        <i class="icon-male"> </i> Users     
     
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-navux">
                       
                        <li class=""><a onclick="allapps('');" href="#"><i class="icon-chevron-left"></i> Pending </a></li>
                        <li class=""><a onclick="allapps('Confirmed');" href="#"><i class="icon-check"></i> Approved </a></li>
                         <li class=""><a onclick="allapps('Cancelled');" href="#"><i class="icon-remove"></i> Blocked </a></li>
                        
                        
                        
                         </ul>
                </li>
      
                <li class="panel active">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-navx">
                        <i class="icon-search"> </i> Search Images     
     
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-navx">
                       
                        <li class=""><a  href="#"><i class="icon-upload"></i> Uploaded </a></li>
                        <li class=""><a  href="#"><i class="icon-download"></i> Downloaded </a></li>
                        
                         </ul>
                </li>

                <li class="active"><a  href="logout.php"><i class="icon-cog"></i> Logout </a></li>
                        


            </ul>

        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content" style="background-image: url('../bgg.png')">
             
            <div class="inner" style="min-height: 700px;background-image: url('../assets/img/mia.png')">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="color:navy"><i class="icon-cog icon-spin"></i> Admin  Dashboard </h1>
                    </div>
                </div>
                  <hr />

 <!-- Modal -->
                      <div class="modal fade" id="auth" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header" style="background:rgb(6, 33, 63)">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" id='authtitle'><b style="color:white"><i class="icon-check"></i> Authorize Application</b></h4>
                            </div>
                            <div class="modal-body" id='authbody' style="text-align:left;">


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary outline" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>



                   <!-- CHART & CHAT  SECTION -->
                 <div class="row" id='mainarea' style="margin:0% 10%; background:white">
                   







 <div class="panel panel-primary" style="background:gold; color:navy">
                            <div class="panel-heading" style="background:navy; color:white">
                                MIA  DashBoard
                            </div>
                            <div class="panel-body">
                                <p class="text-center " title='Yea'><br><br><br><i class="icon-info icon-4x"></i><br>Please note that you are to be careful in changing contents in this area!</p>
                            </div>
                            <div class="panel-footer">
                                <i class="icon-copyright"></i> 2016, All Rights Reserved to MIA
                            </div>
                        </div>







                   </div>
                 <!--END CHAT & CHAT SECTION -->
                 
                
            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
        
            
         

         
          
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  <a target="_blank" href="http://www.facebook.com/olabanjo1">MIA &nbsp;<?php echo date('Y', time()) ?> &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
   <script src="assets/js/jquery.min.js"></script>  
  
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   

  <!-- PAGE LEVEL SCRIPTS -->
    <script src="../research/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../research/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    

 
    <!-- END PAGE LEVEL SCRIPTS -->

<!-- jQuery Plugin
<script type="text/javascript" src="httpnns://code.jquery.com/jquery-1.12.3.min.js"></script> -->

<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
</body>

    <!-- END BODY -->
</html>




<script type="text/javascript">
  var xmlHttp;
//method return a XMLHttpRequest Object
function getXMLHttpRequest(){
    var xmlHttp=null;
    try{// Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }catch(e){
        try{ // Internet Explorer
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
         }catch(e){
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
    }
    return xmlHttp;
}



         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         }); 




function confirmit(data){
  var confdiv = "confuser"+data;
  var confdiv2 = "#confuser"+data;

  var overx = "Sure?<br/><a style='color:green' href='#' onclick=\"confconf('"+data+"')\"><i class='icon-check icon-2x'></i></a> <a href='#' style='color:red' onclick=\"reject('"+data+"')\"><i class='icon-remove icon-2x'></i></a>";




 document.getElementById(confdiv).innerHTML=overx;
  
}


function rej(data){
  var confdiv = "rejuser"+data;
  var confdiv2 = "#rejuser"+data;

  var overx = "Sure?<br/><a style='color:green' href='#' onclick=\"rejrej('"+data+"')\"><i class='icon-check icon-2x'></i></a> <a href='#' style='color:red' onclick=\"reject2('"+data+"')\"><i class='icon-remove icon-2x'></i></a>";




 document.getElementById(confdiv).innerHTML=overx;
  
}

function confconf(data){
  var confdiv = "confuser"+data;
var confdiv2 = "rejuser"+data;

  xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="js/fine.php?user_id="+data;
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 

    document.getElementById(confdiv).innerHTML=xmlHttp.responseText;
    document.getElementById(confdiv2).innerHTML="";
    
        }else{
      document.getElementById(confdiv).innerHTML="<center>Loading...</center>";
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}

function rejrej(data){
  var confdiv = "rejuser"+data;
var confdiv2 = "confuser"+data;

  xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="js/notfine.php?user_id="+data;
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 

    document.getElementById(confdiv).innerHTML=xmlHttp.responseText;
    document.getElementById(confdiv2).innerHTML="";
    
        }else{
      document.getElementById(confdiv).innerHTML="<center>Loading...</center>";
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}

function reject(data){
  var confdiv = "confuser"+data;
  var overx="<a href='#' style='color:green' onclick=\"confirmit('"+data+"')\"><span class='icon-check'></span>Confirm</a>";

 document.getElementById(confdiv).innerHTML=overx;
  
}

function reject2(data){
  var confdiv = "rejuser"+data;
  var overx="<a href='#' style='color:maroon' onclick=\"rej('"+data+"')\"><span class='icon-thumbs-down'></span>Reject</a>";

 document.getElementById(confdiv).innerHTML=overx;
  
}

function viewsingle(data){
  xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="js/viewsingle.php?hid="+data;
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 

        document.getElementById("authtitle").innerHTML="<span style='color:gold'><i class='icon-info'></i>User Information</span>";
    document.getElementById("authbody").innerHTML=xmlHttp.responseText;
    
        }else{
      document.getElementById("authbody").innerHTML="<center>Loading...<br/><img src='../assets/img/loader.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}




function allapps(data){
  xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="js/viewall.php?status="+data;
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 
        var over = xmlHttp.responseText;
          


 document.getElementById("mainarea").innerHTML="";
 //var res3=xmlHttp.responseText;


            jNode = $(over);
jNode.hide();
$('#mainarea').append(jNode);
jNode.fadeIn(1000);
        }else{
      document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../assets/img/loading8.gif' style='margin-top:10%'/><br>Loading</center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}


</script>


