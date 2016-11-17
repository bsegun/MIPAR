<div class="col-md-8">
	<h3>Add News Here:</h3><hr>
	<p>
	<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Date:</div>
			<div class="col-md-9"><?php echo date('Y-M-d', time())?></div>
	</div>
<form enctype="multipart/form-data" method="post" action="">
<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Feature Image:</div>
			<div class="col-md-9"><input type="file" name="upload" id='upload' class="form-control" /></div>
	</div>
<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">News Title:</div>
			<div class="col-md-9"><input type="text" maxlength="70" class='form-control'  name="title" id="title" required placeholder="Title / Subject of News" /></div>
	</div>

<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">News Caption:</div>
			<div class="col-md-9"><input type="text" class='form-control' maxlength="70"  name="caption" id="caption" required placeholder="This is the short note in the homepage" /></div>
	</div>

<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3">Body of the News:</div>
			<div class="col-md-9">
			<textarea id='body' style="height:300px" name='body' required class="form-control" placeholder="News in details..."></textarea>
			</div>
	</div>

<div class="col-md-12" style="margin:10px 0px 10px 0px;">
			<div class="col-md-3"></div>
			<div class="col-md-9">
			<input type="submit" class="btn btn-lg btn-primary" style='float:right' value="Add +" name="subnews" id='subnews'></div>
	</div>


</form>

	</p>
</div>