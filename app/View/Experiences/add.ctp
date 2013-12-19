
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Experiences</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                      <?php echo $this->Form->create('UserExperience',array('url' => array('controller' => 'experiences', 'action' => 'add'),'class'=>'form-horizontal','role'=>'form')); ?>
                     <?php  echo $this->Form->input('organization_id',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Company Name<i class="red_dot">&bull;</i>')),array('escape'=>false));
					 
					   echo $this->Form->input('occupation_id',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Designation<i class="red_dot">&bull;</i>')),array('escape'=>false));
                       
                       
                        
					   ?>
                       
                      
                      
                          
                          <div class="form-group">
                            <label class="col-md-4 control-label " for="inputEmail3">Time Period<i class="red_dot">&bull;</i></label>
                            <label class="col-md-1 control-label pl_0" for="inputEmail3">From</label>
                            <div class="col-md-2 ">
                            <?php echo $this->Form->month('start_date',array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                              
                            </div>
                            <div class="col-md-2 ">
                            <?php echo $this->Form->year('start_date',1980,date('Y')+20,array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label pr_5" for="inputEmail3">&nbsp;</label>
                            <label class="col-md-1 control-label pl_0" for="inputEmail3">To</label>
                            <div class="col-md-2 ">
                               <?php echo $this->Form->month('end_date',array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                            </div>
                            <div class="col-md-2 ">
                             <?php echo $this->Form->year('end_date',1980,date('Y')+20,array('class'=>'col-md-3 form-control s_month','empty'=>'Select')); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label pr_5" for="inputEmail3">&nbsp;</label>
                            <label>
                            <?php echo $this->Form->input('currently_employed',array('type'=>'checkbox','div'=>false,'label'=>false)); ?>
                       <!--<input type="checkbox" name="data[Certification][expire]">-->
                            Currently employed in this Company</label>
                          </div>
                           <div class="form-group">
                            <label class="col-md-4 control-label ptb_8" for="inputEmail3">Description</label>
                            <div class="col-md-5 pl_0">
                            <?php echo $this->Form->textarea('description',array('div'=>false,'label'=>false,'class'=>'form-control','rows'=>'4','placeholder'=>'Describe your experience here')); ?>
                              
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
          



<script type="text/javascript">
$(document).ready(function(){
						   
						   $('#submitCertificate').on('click',function(e){
																	   e.preventDefault();
																	   $("#UserExperienceAddForm").submit();
																	   });
						   
						   
						   });
</script>



