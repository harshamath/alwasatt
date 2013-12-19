
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Experiences</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                      <?php echo $this->Form->create('UserEducation',array('url' => array('controller' => 'educations', 'action' => 'edit'),'class'=>'form-horizontal','role'=>'form'));
					  echo $this->Form->hidden('id');
					  ?>
                   
                     <?php  echo $this->Form->input('education_degree_id',array('options'=>$EducationDegrees,'class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Degree<i class="red_dot">&bull;</i>')),array('escape'=>false));
					 
					   	echo $this->Form->input('education_major_id',array('options'=>$EducationMajors,'class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Major Subject<i class="red_dot">&bull;</i>')),array('escape'=>false));
                       
					     echo $this->Form->input('education_institute_id',array('options'=>$EducationInstitutes,'class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Institute<i class="red_dot">&bull;</i>')),array('escape'=>false));
                       
                       
                        
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
                            <?php echo $this->Form->input('is_completed',array('type'=>'checkbox','div'=>false,'label'=>false)); ?>
                       <!--<input type="checkbox" name="data[Certification][expire]">-->
                            Education Completed</label>
                          </div>
                           
                          
                        </form>
                        <div class="col-md-12">
                          <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>Remove this Education',array('controller'=>'educations','action'=>'delete',$this->request->data['UserEducation']['id']),array('class'=>'pull-left','escape'=>false), __('Are you sure you want to delete # %s?',$this->request->data['UserEducation']['id'])); ?>
                         
                            <button class="btn btn-primary pull-right" type="button" id="submitCertificate">Save</button>
                            <?php echo $this->Html->link('Cancel',array('controller'=>'educations','action'=>'index'),array('class'=>'btn btn-primary pull-right mr10')) ?> 
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
          



<script type="text/javascript">
$(document).ready(function(){
						   
						   $('#submitCertificate').on('click',function(e){
																	   e.preventDefault();
																	   $("#UserEducationEditForm").submit();
																	   });
						   
						   
						   });
</script>



