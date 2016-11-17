<?php
require_once("../../../../connect.php");

$sql = "select * from emailsub";

if(($query=mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
	$phones = '';
	$no = mysqli_num_rows($query);
	while($row = mysqli_fetch_array($query)){
		$phones .= $row['email'].",";
	}
	echo "<div class='col-md-4 container well jumbotron' id='sections'><h4>Email Address Found</h4><hr>
<textarea class='form-control'  style='height:300px' readonly id='sections'>$phones</textarea>
	</div>
		<div class='col-md-8'>
				<h3><center>$no Email Ready!</center></h3>
				<hr>
				<textarea class='form-control' onkeyup='countit(this.value)' style='height:300px' placeholder='Body of the Message'></textarea><br/>
				<span class='alert alert-warning' id='warn'>0 Words typed</span>
				<br/><br/>
				<button name='mailsend' id='mailsend' style='float:right' type='button'  class='btn btn-lg btn-warning'>Send SMS <span class='glyphicon glyphicon-envelope'></span></button>
		</div>
	";
}else{
	echo '

                    <div class="alert alert-warning ">
                        Sorry, no email subscribers yet!  
                    </div> 
    ';
}


?>


<style type="text/css">
    
    #sections{
     /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f1da36+7,fefcea+83 */
background: rgb(241,218,54); /* Old browsers */
background: -moz-linear-gradient(top, rgba(241,218,54,1) 7%, rgba(254,252,234,1) 83%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(241,218,54,1) 7%,rgba(254,252,234,1) 83%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(241,218,54,1) 7%,rgba(254,252,234,1) 83%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#fefcea',GradientType=0 ); /* IE6-9 */
}

</style>