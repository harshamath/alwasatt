<div class="col-md-8">
            <div class="usercontactinfo">
                <ul class="nav nav-pills">
                  <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span> Dubai, UAE</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> +971562636576</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> email@alwasatt.com</a></li>
                  <li><a href="#"><span class="my-ico-edit"></span></a></li>
                </ul>
                <a href="#" class="pull-right normallink">Exit Edit</a>
            </div>
            <div class="abox mtop30">
                <div class="row">
                    <div class="col-md-7 media-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-9">
                                <div class="userdetail">
                                    <h4 class="media-heading">liena Jonson <span class="my-ico-edit"></span></h4>
                                    <span class="usercategory">Web & Graphic Designer <a class="my-ico-edit"></a></span> 
                                    <button type="button" class="btn btn-primary btnc">
                                        <span class="glyphicon glyphicon-envelope"></span> Contact
                                    </button>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <ul class="nav nav-pills nav-stacked usermeta">
                                    <li><a href="#">500</a><p>Connections</p></li>
                                    <li><a href="#">30</a><p>In Common</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <ul class="nav nav-tabs nav-justified exp-edu">
                            <li><a href="#">Experience</a><img src="../images/experience.png"><p><b>7</b> years</p></li>
                            <li><a href="#">Education</a><img src="../images/education.png"><p>Bachelors</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Certifications</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                      <?php echo $this->Form->create('Certification',array('class'=>'form-horizontal','role'=>'form')); ?>
                     <?php  echo $this->Form->input('certification_name',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Certification Title<i class="red_dot">&bull;</i>')),array('escape'=>false));
					 
					   echo $this->Form->input('certificatiob_authority',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Certification Authority<i class="red_dot">&bull;</i>')),array('escape'=>false));
					   ?>
                       
                      
                      
                          
                          <div class="form-group">
                            <label class="col-md-4 control-label " for="inputEmail3">Validity Date<i class="red_dot">&bull;</i></label>
                            <label class="col-md-1 control-label pl_0" for="inputEmail3">From</label>
                            <div class="col-md-2 ">
                            <?php echo $this->Form->month('certification_start_date',array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                              
                            </div>
                            <div class="col-md-2 ">
                            <?php echo $this->Form->year('certification_start_date',1980,date('Y')+50,array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label pr_5" for="inputEmail3">&nbsp;</label>
                            <label class="col-md-1 control-label pl_0" for="inputEmail3">To</label>
                            <div class="col-md-2 ">
                               <?php echo $this->Form->month('certification_end_date',array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                            </div>
                            <div class="col-md-2 ">
                             <?php echo $this->Form->year('certification_end_date',1980,date('Y')+50,array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label pr_5" for="inputEmail3">&nbsp;</label>
                            <label>
                              <input type="checkbox" name="data[Certification][expire]">
                              This Certificate dose not expire</label>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label ptb_8" for="inputEmail3">Description</label>
                            <div class="col-md-5 pl_0">
                            <?php echo $this->Form->textarea('description',array('div'=>false,'label'=>false,'class'=>'form-control','rows'=>'4','placeholder'=>'Describe your experience here')); ?>
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label ptb_8" for="inputEmail3">Realated Experties</label>
                            <div class="col-md-3 plr_0">
                              <select class="multi_select" name="lvl_1" multiple="multiple">
                                <option>Development</option>
                                <option>Accounting</option>
                                <option>IT</option>
                                <option>Web Design</option>
                                <option>User Interface</option>
                                <option>Buyer</option>
                                <option>Team Leader</option>
                                <option>Human Resources</option>
                                <option>Other</option>
                                <option>Other</option>
                                <option>Other</option>
                              </select>
                            </div>
                            <div class="col-md-1 plr_0">
                              <div class="images "> <a href="#"><img class="mb_10" src="../images/icon1.png"></a> <a href="#"><img src="../images/icon2.png"></a> </div>
                            </div>
                            <div class="col-md-3 plr_0">
                              <select class="multi_select" name="lvl_1" multiple="multiple">
                                <option>Development</option>
                                <option>Accounting</option>
                                <option>IT</option>
                                <option>Web Design</option>
                                <option>User Interface</option>
                                <option>Buyer</option>
                                <option>Team Leader</option>
                                <option>Human Resources</option>
                                <option>Other</option>
                                <option>Other</option>
                                <option>Other</option>
                              </select>
                            </div>
                          </div>
                        </form>
                        <div class="col-md-12">
                          
                            <button class="btn btn-primary pull-right" type="button" id="submitCertificate">Save</button>
                            <?php echo $this->Html->link('Cancel',array('controller'=>'certifications','action'=>'index'),array('class'=>'btn btn-primary pull-right mr10')) ?> 
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>



<script type="text/javascript">
$(document).ready(function(){
						   
						   $('#submitCertificate').on('click',function(e){
																	   e.preventDefault();
																	   $("#CertificationAddForm").submit();
																	   });
						   
						   
						   });
</script>













<?php /*?><div class="certifications form">
<?php echo $this->Form->create('Certification',array('class'=>'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add Certification'); ?></legend>
	<?php
		echo $this->Form->input('certification_name',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('certificatiob_authority',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('license_number',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('certification_url',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('certification_start_date',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('certification_end_date',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php */?>