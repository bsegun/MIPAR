
                                <div id="marea" class="accordion-body collapse in body">
<div id="derror"></div>
<form method='post' enctype='multipart/form-data' class="form-horizontal" id="block-validate">
<fieldset>
	<legend><i class="icon-download"></i>Download Images</legend>




                                        <div class="form-group">
                                            <label class="control-label col-lg-4" style="text-align:right">Select Image Type</label>
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

 

  
                                        <div class="form-actions no-margin-bottom" style="text-align:right;">
                                            <button type="button" onclick="browseit();" name='donate' class="btn btn-line btn-info btn-lg " ><i class="icon-search"></i> Browse</button>
                                        </div>




</fieldset>


</form></div>

 <script>
        $(function () { formValidation(); });
        </script>