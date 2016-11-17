
                                <div id="collapseOne" class="accordion-body collapse in body">

<form method='post' enctype='multipart/form-data' class="form-horizontal" id="block-validate">
<fieldset>
	<legend>Donate Images</legend>




                                        <div class="form-group">
                                            <label class="control-label col-lg-4" style="text-align:right">Image Type</label>
                                            <div class="col-lg-8">
                                                <select required name="type" id="type" class="validate[required] form-control">
                                                    <option value="">Choose an image type</option>
                                                    <option value="CT">CT</option>
                                                    <option value="MRI">MRI</option>
                                                    <option value="Doppler">Doppler</option><option value="Ultrasound">Ultrasound</option>
                                                </select><br>
                                            </div>
                                        </div>

 

                                        <div class="form-group">
                                            <label class="control-label col-lg-4" style="text-align:right">Anatomy</label>
                                            <div class="col-lg-8">
                                                <select required name="anatomy" id="anatomy" class="validate[required] form-control">
                                                    <option value="">Choose anatomy</option>
                                                    <option value="Brain">Brain</option>
                                                    <option value="Chest">Chest</option>
                                                    <option value="Liver">Liver</option><option value="Lung">Lung</option>
                                                </select><br>
                                            </div>
                                        </div>

 
                    <div class="form-group clearfix">
                        <label class="control-label col-lg-4" style="text-align:right">Choose Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">



                                <div class="input-group">
                                    

                                    <span class="btn btn-file btn-default">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input name="upload" type="file" required   />
                                    </span> 
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    
                                    <br /> <br />
                                    <div class="col-lg-3">
                                        <i class="icon-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                            </div>
                        </div>
                    </div>
                        </div>


  
                                        <div class="form-actions no-margin-bottom" style="text-align:right;">
                                            <input type="submit" name='donate' value="Donate" class="btn btn-line btn-primary btn-lg " />
                                        </div>




</fieldset>


</form></div>

 <script>
        $(function () { formValidation(); });
        </script>