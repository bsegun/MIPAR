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

function getpix(data){
	data = data.trim();
	if(data == ""){
document.getElementById("pic").innerHTML="";
		
	}else{
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/getpix.php?appid="+data;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("pic").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("pic").innerHTML="<center>Loading picture...</center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
}

function viewexisting(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/viewexistsing.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function hiddenit(data){
	var data2 = data.trim();
		data = data.split("___");
		var passport=data[0].trim();
		var div  = "thepass"+data[1];
		document.getElementById(div).innerHTML	= "<a href='#' onclick=\"viewp('"+data2+"');\"> View Passport</a>"

}

function viewp(data){
	var data2 = data.trim();
		data = data.split("___");
		var passport=data[0].trim();
			var div  = "thepass"+data[1];
			document.getElementById(div).innerHTML	= "<img src='../../../programmes/std/"+passport+"' style='float:center; width:150px; height:150px;'><br/><a href='#' onclick=\"hiddenit('"+data2+"')\">Hide</a>"
}

function addit(){
	var passport = document.getElementById('passport').value.trim();
	var appid = document.getElementById('appid').value.trim();
	var stdid = document.getElementById('stdid').value.trim();
	var sname = document.getElementById('sname').value.trim();
	var fname = document.getElementById('fname').value.trim();
	var mname = document.getElementById('mname').value.trim();
	var clas = document.getElementById('class').value.trim();
	var phone = document.getElementById('phone').value.trim();
	var address = document.getElementById('address').value.trim();
	var sex = document.getElementById('sex').value.trim();
	var email = document.getElementById("email").value.trim();
	if(stdid=='' || passport=='' || appid=='' || sname=='' || fname=='' || mname=='' || clas=='' || phone=='' || address=='' || sex=='' || email==''){
		document.getElementById('stderror').innerHTML = "<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info fa-spin'></i>ERROR: Some required fields are empty!</div></center>";
	}else{
			xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/addit.php?stdid="+stdid+"&passport="+passport+"&sname="+sname+"&appid="+appid+"&fname="+fname+"&mname="+mname+"&class="+clas+"&phone="+phone+"&address="+address+"&email="+email+"&sex="+sex;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				


var res=xmlHttp.responseText;
				if(res == "Done"){
					var togo = "Student Saved successfully!";
					alert(togo);
					addnew();
				}else{
					alert("Error uploading student information!");
					addnew();
					//document.getElementById("suberror").innerHTML=res;
		
				}





				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
	}
}


function subcourses(){
	var ccode = document.getElementById('ccode').value.trim();
	var ctitle = document.getElementById('ctitle').value.trim();
	var cunit = document.getElementById('cunit').value.trim();
	var clas = document.getElementById('clas').value.trim();

	if(ccode == "" || ctitle == "" || cunit=='' || clas==''){
		document.getElementById('suberror').innerHTML = "<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: Invalid data supplied!</div></center>";

	}else{

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/subcourse.php?ccode="+ccode+"&ctitle="+ctitle+"&cunit="+cunit+"&clas="+clas;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				



var res=xmlHttp.responseText;
				if(res == "Done"){
					var togo = "Course upload successful!";
					alert(togo);
					addcourses();
				}else{
					alert("Error uploading course!");
					addcourses();
					//document.getElementById("suberror").innerHTML=res;
		
				}




				}else{
			document.getElementById("suberror").innerHTML="<center>Loading...</center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
	}
}



function addcourses(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/addcourse.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function addnew(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/addnew.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function delcourse(data){
	var conf = confirm("Sure to delete?");
	if(conf == true){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/delcourse.php?id="+data;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				

var res=xmlHttp.responseText;
				if(res == "Done"){
					var togo = "Course deleted successfully successfully!";
					alert(togo);
					addcourses();
				}else{
					alert("Unknown error occured!");
					addcourses();
				}



				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
	}else{
		alert("Delete operation aborted!");
		addcourses();
	}
}


function savestatus(){
	var status = document.getElementById('adm').value.trim();
	var score = document.getElementById('score').value.trim();
	var appid = document.getElementById('appid').value.trim();
	if(score=='' || status==''){
document.getElementById('formresult').innerHTML = "<center><div class='alert alert-error' style='width:50%'><i class='fa fa-info'></i>ERROR: Invalid data supplied!</div></center>"
	
	}else{

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/savestatus.php?score="+score+"&appid="+appid+"&status="+status;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				

var res=xmlHttp.responseText;
				if(res == "Done"){
					var togo = "Status upload successful!";
					alert(togo);
					admitprop();
				}else{
					alert("Error uploading status!");
					admitprop();
				}



				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
	}
}


function endapp(){
	var conf = confirm("Are you sure to close? Changes submitted cannot be undone in this dashboard");
	if(conf == true){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/endapp.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				

var res=xmlHttp.responseText;
				if(res == "Done"){
					var togo = "Application closed successfully!";
					alert(togo);
					authorize();
				}else{
					alert("Application over for this session already!");
					authorize();
				}



				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
	}else{
		alert("Close operation aborted!");
		authorize();
	}
}

function openapp(){
	var session = document.getElementById('session').value.trim();
	var type = document.getElementById('type').value.trim();
	if(session == ''){
		document.getElementById('err').innerHTML = "<div style='width:40%; float:center' class='col-md-3 alert alert-error'><span class='fa fa-info fa-spin fa-2x'></span> Please select session accordingly!</div>"
	}else{
		if(type == ''){
			document.getElementById('err').innerHTML = "<div style='width:40%; float:center' class='col-md-3 alert alert-error'><span class='fa fa-info fa-spin fa-2x'></span> Please select type accordingly!</div>"
		}else{
				xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/openapp.php?session="+session+"&type="+type;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				var res=xmlHttp.responseText;
				if(res == "Done"){
					var togo = "Application for "+session+" Session -  "+type+" opened successfully!";
					alert(togo);
					authorize();
				}else{
					alert("Application over for this session already!");
					authorize();
				}
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
			}
	}
}


function authorize(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/authorize.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function addnews(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/addnews.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function delnews(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/delnews.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function manageteam(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/manageteam.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}



function addteam(){

	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/addteam.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function deln(data){


var ret = confirm("Are you sure to delete news?");
if(ret == true){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/deln.php?hid="+data;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				var res=xmlHttp.responseText;
				if(res == "done"){
					alert("Deleted successfully!!!");
					delnews();
				}
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
	
}

function delt(data){


var ret = confirm("Are you sure to delete news?");
if(ret == true){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/delt.php?hid="+data;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				var res=xmlHttp.responseText;
				if(res == "done"){
					alert("Deleted successfully!!!");
					manageteam();
				}
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
	
}



function countit(data){
var count = data.length;
var ct = count+" Characters typed!";
		document.getElementById("warn").innerHTML=ct;
		
}


function sendsms(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/sendsms.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function sendmail(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/sendmail.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function closeview(){
	document.getElementById("contdiv").innerHTML="";
		
}


function smsall(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/smsall.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function smsallad(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/smsallad.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
function smsallpd(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/smsallpd.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
function smsallnad(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/smsallnad.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function mailall(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/mailall.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
function mailallad(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/mailallad.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function mailallnad(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/mailallnad.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}
function mailallpd(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/mailallpd.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
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
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function dall(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/dall.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}



function smssingle(data){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/smssingle.php?data="+data;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function mailsingle(data){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/mailsingle.php?data="+data;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("contdiv").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("contdiv").innerHTML="<center>Loading...<br/><img src='../loading5.gif' style='margin-top:10%; height:14px; width:200px'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function viewall(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/viewall.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function loadformforadmission(){
	var appid = document.getElementById('appid').value;
	if(appid==''){
		document.getElementById('formresult').innerHTML = "<center><div class='alert alert-error' style='width:50%'><i class='fa fa-remove'></i>ERROR: Please fill in the ID</div></center>"
	}else{
		xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/loadforad.php?appid="+appid;
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("formresult").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("formresult").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
	}
}

function admitprop(){
		xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/formno.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}



function viewadmitted(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/viewadmitted.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}


function viewnotadmitted(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/viewnotadmitted.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}

function viewpending(){
	xmlHttp=getXMLHttpRequest();
	if(xmlHttp==null){
		alert("Your browser does not support Ajax");
		return;
	}
	
	var url="js/viewpending.php";
	xmlHttp.onreadystatechange=function(){ 
		if (xmlHttp.readyState==4){ 
				document.getElementById("mainarea").innerHTML=xmlHttp.responseText;
		
				}else{
			document.getElementById("mainarea").innerHTML="<center>Loading...<br/><img src='../loading.gif' style='margin-top:10%'/></center>";;
		}
	}
	xmlHttp.open("GET",url,true);	
	xmlHttp.send(null);
}