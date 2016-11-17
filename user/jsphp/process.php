
<h2><i class="icon-film icon-spin"></i> Process Image</h2>




                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background:navy; color:gold">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Dicom to Analyze</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                               
                                               <form method="post" action="" enctype="multipart/form-data">
                                                   <fieldset>
                                                       <legend>Dicom to Analyze</legend>


 
                    <div class="form-group clearfix">
                        <label class="control-label col-lg-4" style="text-align:right">Choose Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">



                                <div class="input-group" >
                                    

                                    <span class="btn btn-file btn-primary btn-line">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input title="must be of .gz extension" name="upload" type="file" required   />
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
                                            <input type="submit" name='dicomtoanalyze' value="Process" class="btn btn-primary btn-lg " />
                                        </div>


                                                   </fieldset>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background:navy; color:gold">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Brain Extraction</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                  
                                               <form method="post" action="" enctype="multipart/form-data">
                                                   <fieldset>
                                                       <legend>Brain Extraction</legend>



 
                    <div class="form-group clearfix">
                        <label class="control-label col-lg-4" style="text-align:right">Choose Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">



                                <div class="input-group" >
                                    

                                    <span class="btn btn-file btn-primary btn-line">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input title="must be of .gz, .nii or .nii.gz extension" name="extractupload" type="file" required   />
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
                                            <input type="submit" name='extract' value="Extract" class="btn btn-primary btn-lg " />
                                        </div>


                                                   </fieldset>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background:navy; color:gold">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Brain Segmentation</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                 
                                               <form method="post" action="" enctype="multipart/form-data">
                                                   <fieldset>
                                                       <legend>Brain Segmentation</legend>



 
                    <div class="form-group clearfix">
                        <label class="control-label col-lg-4" style="text-align:right">Choose Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">



                                <div class="input-group" >
                                    

                                    <span class="btn btn-file btn-primary btn-line">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input title="must be of .gz, .nii or .nii.gz extension" name="upload" type="file" required   />
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
                                            <input type="submit" name='segment' value="Segment" class="btn btn-primary btn-lg " />
                                        </div>

                                                   </fieldset>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background:navy; color:gold">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Image Registration</a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                 
                                               <form method="post" action="" enctype="multipart/form-data">
                                                   <fieldset>
                                                       <legend>Image Registration</legend>



 
                    <div class="form-group clearfix">
                        <label class="control-label col-lg-4" style="text-align:right">Reference Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">



                                <div class="input-group" >
                                    

                                    <span class="btn btn-file btn-primary btn-line">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input title="must be of .gz, .nii or .nii.gz extension" name="upload" type="file" required   />
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


 
                    <div class="form-group clearfix">
                        <label class="control-label col-lg-4" style="text-align:right">Target Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">



                                <div class="input-group" >
                                    

                                    <span class="btn btn-file btn-primary btn-line">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input title="must be of .gz, .nii or .nii.gz extension" name="upload" type="file" required   />
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
                                            <input type="submit" name='registerimage' value="Register Image" class="btn btn-primary btn-lg " />
                                        </div>
                                                   </fieldset>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


