
<style type="text/css">
	label{
		text-align: right;
	}
</style>

<div class="col-md-10">
	<h3>Add New Student</h3><hr>

	<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" ></label>
							<div class="col-md-8" id="stderror">
									
							</div>
						</div><div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" ></label>
							<div class="col-md-8" id="pic">
									
							</div>
						</div>
<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Application ID:</label>
							<div class="col-md-8" >
									<input placeholder='Application ID' onkeyup="getpix(this.value)" type='text' class='form-control' required id='appid' name='appid' />
							</div>
						</div>
<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Student ID:</label>
							<div class="col-md-8" >
									<input placeholder='Student ID' type='text' class='form-control' required id='stdid' name='stdid' />
							</div>
						</div>

	<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Surname:</label>
							<div class="col-md-8" >
									<input placeholder='Enter surname' type='text' class='form-control' required id='sname' name='sname' />
							</div>
						</div>

			<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >First Name:</label>
							<div class="col-md-8" >
									<input placeholder='Enter first name' type='text' class='form-control' required id='fname' name='fname' />
							</div>
						</div>

			<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Last Name:</label>
							<div class="col-md-8" >
									<input placeholder='Enter middle name' type='text' class='form-control' required id='mname' name='mname' />
							</div>
						</div>

					<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Sex:</label>
							<div class="col-md-8" >
									<select class="form-control" id="sex" name="sex">
										<option value="">---Sex---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>

									</select>
							</div>
						</div>



<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Address:</label>
							<div class="col-md-8" >
									<input placeholder='Address' type='text' class='form-control' required id='address' name='address' />
							</div>
						</div>



<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Phone:</label>
							<div class="col-md-8" >
									<input placeholder='Phone' type='text' class='form-control' required id='phone' name='phone' />
							</div>
						</div>


<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Email:</label>
							<div class="col-md-8" >
									<input placeholder='E-mail' type='email' class='form-control' required id='email' name='email' />
							</div>
						</div>



<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" >Class:</label>
							<div class="col-md-8" >
							<select class="form-control" id="class" name="class">
										<option value="">---Class---</option>
										<option value="Year One">Year One</option>
										<option value="Year Two">Year Two</option>
<option value="Advance">Advance Diploma</option>

									</select>
									</div>
						</div>




<div class="form-group clearfix" >
							<label class="col-md-3 control-label text-danger" for="" ></label>
							<div class="col-md-8" >
							<input onclick="addit();" type="button" class="btn btn-lg btn-primary" style="float:right" value="Add Student" />
									</div>
						</div>





</div>