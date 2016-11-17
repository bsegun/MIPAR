<?php
session_start();
include '../dbcon/dbcon.php';
if(!isset($_SESSION['reguser'])){
    ?>
<script>
    window.location.assign("../index.php");
</script>
    <?php
    exit;
}

// echo exec('whoami');
//echo ini_get('disable_functions');

function getuserid($data){
  include("../dbcon/dbcon.php");
  $sql = "SELECT user_id from regtable where email='$data'";
  if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query)==1)){
    $row = mysqli_fetch_array($query);
    return $row['user_id'];
  }
}


$method ="POST";
$url = "http://oar.sci-gaia.eu/batchuploader/robotupload/insert";
//$data = mia-test-upload.xml;

 

$email = $_SESSION['reguser'];
$user_id  = getuserid($email);


if(isset($_POST['donate'])){
  $type = $_POST['type'];
  $anatomy = $_POST['anatomy'];
  $imgname = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];
$typex = $_FILES['upload']['type'];
$date = date('d-M-Y', time());
$d = date('s',time());
$time = time().'.'.$d;
$dated =     date('Y/m/d', time());
$uni = uniqid('MIPAR Image ');
$sql = "insert into donation(imgtype, anatomy, imgname, dated, user_id,email,stamp, datein, uni) values ('$type', '$anatomy', '$imgname', '$date', '$user_id', '$email', '$time', '$dated', '$uni')";

if((move_uploaded_file($temp, "../donation/{$user_id}/$imgname"))&&($query = mysqli_query($con, $sql))){



$xml = '<?xml version="1.0" encoding="UTF-8"?>
<collection xmlns="http://www.loc.gov/MARC21/slim">
<record xmlns="http://www.loc.gov/MARC21/slim">
      <datafield tag="024" ind1="7" ind2=" ">
           <subfield code="a">10.15169/sci-gaia:'.$time.'</subfield>
           <subfield code="2">DOI</subfield>
    </datafield>
    <datafield tag="260" ind1=" " ind2=" ">
    <subfield code="c">'.$dated.'</subfield>
     </datafield>
     <datafield tag="100" ind1=" " ind2=" ">
          <subfield code="a">MIPAR Project</subfield>
    </datafield>
    <datafield tag="245" ind1=" " ind2=" ">
          <subfield code="a">'.$uni.'</subfield>
    </datafield>
    <datafield tag="520" ind1=" " ind2=" ">
          <subfield code="a">This is an image of the MIPAR Project.</subfield>
    </datafield>
    <datafield tag="540" ind1=" " ind2=" ">
           <subfield code="a">cc-by-nc-nd</subfield>
    </datafield>
    <datafield tag="536" ind1=" " ind2=" ">
      <subfield code="c">MIPAR Project</subfield>
  </datafield>
     <datafield tag="653" ind1="1" ind2=" ">
           <subfield code="a">'.$type.'</subfield>
         </datafield>
     <datafield tag="653" ind1="1" ind2=" ">
           <subfield code="a">'.$anatomy.'</subfield>
         </datafield>
    <datafield tag="FFT" ind1="" ind2=" ">
          <subfield code="a">http://lasucomputerscience.com/mia/donation/'.$user_id.'/'.$imgname.'</subfield>
    </datafield>
    <datafield xmlns="" tag="980" ind1=" " ind2=" ">
          <subfield code="a">IMAGESMIPAR</subfield>
    </datafield>
    <datafield xmlns="" tag="041" ind1=" " ind2=" ">
          <subfield code="a">eng</subfield>
    </datafield>
    <datafield xmlns="" tag="042" ind1=" " ind2=" ">
          <subfield code="a">Researchers</subfield>
    </datafield>
    <datafield xmlns="" tag="043" ind1=" " ind2=" ">
           <subfield code="a">Image</subfield>
    </datafield>
  </record>
</collection>
';
    
    $my_file = "{$user_id}.xml";
    $handle=fopen($my_file, 'w');
    fwrite($handle, $xml);
    
    
    $file_path_str = $my_file;

$url_path_str = 'http://oar.sci-gaia.eu/batchuploader/robotupload/insert';
$headers = [
    'Content-Type: application/marcxml+xml',
    'User-Agent: invenio_webupload'
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ''.$url_path_str.'');
curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$fh_res = fopen($file_path_str, 'r');
curl_setopt($ch, CURLOPT_INFILE, $fh_res);
curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path_str));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$curl_response_res = curl_exec ($ch);
fclose($fh_res);
//echo $curl_response_res;



//unlink($my_file);
//echo CallAPI($method, $url, $xml);
?>
<script>
 alert("Image successfully uploaded! ");
 window.location.assign("index.php");
</script>
  <?php

}else{
  ?>
<script>
  alert("Sorry, an unknown error occured while uploading your image!");
  donatex();
</script>
  <?php
}


}



///TEST
/*
$url_path_str = 'http://151.97.41.48:8888/v1.0/tasks/18';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ''.$url_path_str.'');
$curl_response_res = curl_exec ($ch);
echo $curl_response_res;
*/



if(isset($_POST['extract'])){
    $imgname = $_FILES['extractupload']['name'];
    $temp = $_FILES['extractupload']['tmp_name'];
    $typex = $_FILES['extractupload']['type'];
                $d = date('s',time());
                $email = $_SESSION['reguser'];
                $exp = explode("@", $email);
                $nn = $exp[0].$d;
    $newname = explode(".", $imgname);
    if(end($newname) != "zip"){
?>
  <script type="text/javascript">
    alert("ERROR: File must be in zip format!");

  </script>
<?php
    }else{

mkdir($nn);

move_uploaded_file($temp, "{$nn}/{$imgname}");
$outname = explode(".", $imgname);
$outname = $outname[0];

/*$json = '{
    "application":"9",
    "description":"Brain Extraction", 
    "input_files": [{
        "name":"'.$imgname.'"
    }],
    "output_files": [{
        "name":"'.$outname.'.tar.gz"
        
    }]
}';*/
$json = '{
    "application":"9",
    "description":"Brain Extraction", 
    "input_files": [{
        "name":"sample_MRI.zip"
    }],
    "output_files": [{
        "name":"mipar-output.tar.gz"
        
    }]
}';


  $my_file = "{$nn}.json";
    $handle=fopen($my_file, 'w');
    fwrite($handle, $json);
    $file_path_str = $my_file;

//$url_path_str = "http://151.97.41.48:8888/v1.0/tasks?user=$nn";
//echo $url_path_str;
//$headers = [
//    'Content-Type: application/json'
//];


$url_path_str = 'http://151.97.41.48:8888/v1.0/tasks/18';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ''.$url_path_str.'');
$curl_response_res = curl_exec ($ch);
echo $curl_response_res;




/*echo $url_path_str;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ''.$url_path_str.'');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$json_data = file_get_contents($file_path_str);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$curl_response_res = curl_exec($ch);
echo $curl_response_res;



      $zip = new ZipArchive();

$DelFilePath="first.zip";

if(file_exists($_SERVER['DOCUMENT_ROOT']."/TEST/".$DelFilePath)) {

        unlink ($_SERVER['DOCUMENT_ROOT']."/TEST/".$DelFilePath); 

}
if ($zip->open($_SERVER['DOCUMENT_ROOT']."/TEST/".$DelFilePath, ZIPARCHIVE::CREATE) != TRUE) {
        die ("Could not open archive");
}
    $zip->addFile("file_path","file_name");

// close and save archive

$zip->close();

*/
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
    <title id='ttl'>MIA | User Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="../admin/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../admin/assets/css/main.css" />
    <link rel="stylesheet" href="../admin/assets/css/theme.css" />
    <link rel="stylesheet" href="../admin/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../admin/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="../admin/assets/css/layout2.css" rel="stylesheet" />
       <link href="../admin/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="../admin/assets/plugins/timeline/timeline.css" />
       <link rel="stylesheet" href="../admin/assets/css/bootstrap-fileupload.min.css" />

     <link rel="stylesheet" href="../admin/assets/plugins/validationengine/css/validationEngine.jquery.css" />
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
    background-image:url(../assets/img/loading8.gif); /* path to your loading animation */
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
                          
                            <li class="divider"></li>
                            <li><a href="../admin/logout.php"><i class="icon-signout"></i> Logout </a>
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
                    <img style="width:70px; height:70px" class="media-object img-circle user-img" alt="Admin Picture" src="../assets/img/avatar.jpg" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading">You are</h5>
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
                    <a href="index.php" >
                        <i class="icon-dashboard"></i> Dashboard
     
                       
                    </a>                   
                </li>



               
              

                <li class="active"><a onclick="donate();" href="#"><i class="icon-male"></i> Donate Images </a></li>
    <li class="active"><a onclick="downloadx();"  href="#"><i class="icon-save"></i> Download Images </a></li>
                        
                   
<li class="active"><a onclick="process();"  href="#"><i class="icon-qrcode"></i> Process Images </a></li>
                            

            </ul>

        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content" style="background-image: url('../bgg.png')">
             
            <div class="inner" style="min-height: 700px;background-image: url('../../admin/assets/img/mia.png')">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="color:navy"><i class="icon-user"></i> Welcome, <span id="nm"></span></h1>
                       
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
                   




 <div class="panel panel-primary" style="background:gold; color:rgb(6, 33, 63)">
                            <div class="panel-heading" style="background:rgb(6, 33, 63); color:white">
                                Welcome, you are logged in as <?php echo $_SESSION['reguser'];?>
                            </div>
                            <div class="panel-body" id='contentarea'>
                                <p class="text-center " title='Yea' >
                                <h3><i class="icon-user"></i> Your Profile</h3>

                                <?php
if(isset($_SESSION['reguser'])){
  //echo "<a href='#' onclick='closeview()' style='float:right'><span class='glyphicon glyphicon-remove'></span> Close</a><hr/><iframe style='height:500px; width:100%' src='../printengine/examples/oustpart.php?appid=".trim($_GET['hid'])."'></iframe>";


  require_once("../dbcon/dbcon.php");
  $sql = "SELECT * from regtable where email='".$_SESSION['reguser']."'";
  if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query)==1)){
    $row = mysqli_fetch_array($query);
    ?>

<table class='table'>
  <tr><td>Name: </td><td style='font-weight: bold'><?php echo $row['title']; ?> <?php echo $row['sname']; ?> <?php echo $row['onames']; ?></td></tr> <tr><td>Email:</td><td style='font-weight: bold'><?php echo $row['email']; ?></td></tr>
  <tr><td>Profession</td><td style='font-weight: bold'><?php echo $row['profession']; ?></td></tr>
<tr><td>Research Areas</td><td style='font-weight: bold'><?php echo $row['research']; ?>  </td></tr>
<tr><td>Phone Number</td><td style='font-weight: bold'><?php echo $row['phone']; ?></td></tr>
<tr><td>Address: </td><td style='font-weight: bold'><?php echo $row['address']; ?></td></tr>

</table>
    <?php
  }else{
    echo "<span style='color:gold'><i class='icon-info'></i>  Information not loaded!</span>";
  }
}


?>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <i class="icon-copyright"></i> © MIPAR  2016  
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
        <p>&copy;  <a target="_blank" href="http://www.facebook.com/olabanjo1">MIPAR &nbsp;<?php echo date('Y', time()) ?> &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
   <script src="../admin/assets/js/jquery.min.js"></script>  
  
    <script src="../admin/assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="../admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="../admin/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="../admin/assets/plugins/flot/jquery.flot.js"></script>
    <script src="../admin/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../admin/assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="../admin/assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="../admin/assets/js/for_index.js"></script>
   

  <!-- PAGE LEVEL SCRIPTS -->
    <script src="../admin/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../admin/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <!-- PAGE LEVEL SCRIPTS -->

     <script src="../admin/assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="../admin/assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="../admin/assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="../admin/assets/js/validationInit.js"></script>
    <script>
        $(function () { formValidation(); });
        </script>
     <!--END PAGE LEVEL SCRIPTS -->

 
    <!-- END PAGE LEVEL SCRIPTS -->
 <script src="../admin/assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    
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

    <script src="../admin/assets/js/notifications.js"></script>
  <script>
      $(function () { Notifications(); });
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


function donate(){
  xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="jsphp/donate.php";
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 
        var over = xmlHttp.responseText;
          


 document.getElementById("contentarea").innerHTML="";
 //var res3=xmlHttp.responseText;


            jNode = $(over);
jNode.hide();
$('#contentarea').append(jNode);
jNode.fadeIn(1000);
        }else{
      document.getElementById("contentarea").innerHTML="<center><br/><img src='../assets/img/loading8.gif' style='margin-top:10%'/><br>Loading</center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}



function process(){

   xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="jsphp/process.php";
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 
        var over = xmlHttp.responseText;
          


 document.getElementById("contentarea").innerHTML="";
 //var res3=xmlHttp.responseText;


            jNode = $(over);
jNode.hide();
$('#contentarea').append(jNode);
jNode.fadeIn(1000);
        }else{
      document.getElementById("contentarea").innerHTML="<center><br/><img src='../assets/img/loading8.gif' style='margin-top:10%'/><br>Loading</center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}

function downloadx(){

   xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="jsphp/download.php";
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 
        var over = xmlHttp.responseText;
          


 document.getElementById("contentarea").innerHTML="";
 //var res3=xmlHttp.responseText;


            jNode = $(over);
jNode.hide();
$('#contentarea').append(jNode);
jNode.fadeIn(1000);
        }else{
      document.getElementById("contentarea").innerHTML="<center><br/><img src='../assets/img/loading8.gif' style='margin-top:10%'/><br>Loading</center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
}

function confirmit(data){
  var confdiv = "confuser"+data;
  var confdiv2 = "#confuser"+data;

  var overx = "Sure?<br/><a style='color:green' href='#' onclick=\"confconf('"+data+"')\"><i class='icon-check icon-2x'></i></a> <a href='#' style='color:red' onclick=\"reject('"+data+"')\"><i class='icon-remove icon-2x'></i></a>";




 document.getElementById(confdiv).innerHTML=overx;
  
}

function browseit(){
  var type = document.getElementById('type').value.trim();
  var anatomy = document.getElementById('anatomy').value.trim();
  if (type=='' || anatomy==''){
    document.getElementById('derror').innerHTML = "<div class='alert alert-warning'><b>ERROR:</b> Sorry, select type and anatomy accordingly </div>";
  }else{

   xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="jsphp/browseit.php?type="+type+"&anatomy="+anatomy;
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 
        var over = xmlHttp.responseText;
          


 document.getElementById("contentarea").innerHTML="";
 //var res3=xmlHttp.responseText;


            jNode = $(over);
jNode.hide();
$('#contentarea').append(jNode);
jNode.fadeIn(1000);
        }else{
      document.getElementById("contentarea").innerHTML="<center><h2><i class='icon-spin icon-spinner'></i></h2>Loading...</center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null);
  }
}

function loaded(data){
var newlim = parseInt(data)-10;

     xmlHttp=getXMLHttpRequest();
  if(xmlHttp==null){
    alert("Your browser does not support Ajax");
    return;
  }
  
  var url="jsphp/loaded.php?id="+data;
  xmlHttp.onreadystatechange=function(){ 
    if (xmlHttp.readyState==4){ 
        var over = xmlHttp.responseText;
          if(over == "end"){
              document.getElementById("load").innerHTML="<center><h2><i class='icon-bolt'></i> End of list!</h2></center>";
          }else{
                 document.getElementById("load").innerHTML="<h3 style='cursor:pointer; text-align:center' onclick=\"loaded('"+newlim+"')\"><i class='icon-refresh'></i> Load more</h3>";
                $('#myTable tbody').append(over);
          }

        }else{
      document.getElementById("load").innerHTML="<center><h2><i class='icon-spin icon-spinner'></i>Loading... </h2></center>";;
    }
  }
  xmlHttp.open("GET",url,true); 
  xmlHttp.send(null); 
}


document.getElementById('nm').innerHTML = "<?php echo $row['sname'].'!';?>";
document.getElementById('ttl').innerHTML = "<?php echo $row['sname'];?>'s Area";
</script>


