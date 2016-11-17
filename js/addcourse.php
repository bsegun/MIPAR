
<div class="col-md-10 row">
	<h3>Add Course Here:</h3><hr>
	<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Course Code:</div>
			<div class="col-md-9"><input onkeyup="this.value = this.value.toUpperCase();"  type="text" minlength='7' maxlength='7' placeholder="e.g BIB 112" name="ccode" id='ccode' class="form-control" />
	</div>

	</div>
<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Course Title:</div>
			<div class="col-md-7"><input type="text" placeholder="Course title" name="ctitle" id='ctitle' class="form-control" /><div class="col-md-5" id='ccodeerror'></div>
	</div>


</div>

<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Units:</div>
			<div class="col-md-9">

			<select id="cunit" class="form-control" >
				<option value="">--Select units--</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>

			</select>
	</div>


</div>

<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Class:</div>
			<div class="col-md-9">

			<select class="form-control" id="clas">
				<option value="">--Select class--</option>
				<option value="Year One">Year One</option>
				<option value="Year Two">Year Two</option>
				<option value="Advance">Advance</option>
			</select>
	</div>


</div>


<div class="col-md-12" style="margin:10px 0px 10px 0px;" id="suberror">
		
</div>


<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3"></div>
			<div class="col-md-9">
			<button class="btn btn-primary" style="float:right" onclick="subcourses()"><i class="fa fa-save"></i> Save Course</button>
	</div>


</div>


</div>


<div class="col-md-10 row">
	<?php include_once("courselist.php"); ?>
</div>