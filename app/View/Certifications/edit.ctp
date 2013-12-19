
            
            
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Certifications</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                      <?php echo $this->Form->create('Certification',array('class'=>'form-horizontal','role'=>'form'));
					  echo $this->Form->hidden('id');
					  ?>
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
                              <div class="images "> <a href="#"><img class="mb_10" src="<?php echo $this->Html->url('/images/icon1.png'); ?>"></a> <a href="#"><img src="<?php echo $this->Html->url('/images/icon2.png'); ?>"></a> </div>
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
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>Remove this certificate',array('controller'=>'certifications','action'=>'delete',$this->request->data['Certification']['id']),array('class'=>'pull-left','escape'=>false), __('Are you sure you want to delete # %s?',$this->request->data['Certification']['id'])); ?>
                         
                            <button class="btn btn-primary pull-right" type="button" id="submitCertificate">Save</button>
                            <?php echo $this->Html->link('Cancel',array('controller'=>'certifications','action'=>'index'),array('class'=>'btn btn-primary pull-right mr10')) ?> 
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
         



<script type="text/javascript">
$(document).ready(function(){
						   
						   $('#submitCertificate').on('click',function(e){
																	   e.preventDefault();
																	   $("#CertificationEditForm").submit();
																	   });
						   
						   
						   });
</script>













