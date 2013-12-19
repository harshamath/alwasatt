
           
            
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Patents</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                      <?php echo $this->Form->create('Patent',array('class'=>'form-horizontal','role'=>'form'));
					  echo $this->Form->hidden('id');
					  ?>
                     <?php  echo $this->Form->input('patent_office_id',array('options'=>$patentoffices,'class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Patent Office<i class="red_dot">&bull;</i>')),array('escape'=>false));
					 
					   echo $this->Form->input('title',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Title<i class="red_dot">&bull;</i>')),array('escape'=>false));
					    echo $this->Form->input('patent_application_number',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Patent Application Number<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
						echo $this->Form->input('inventors',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Inventors<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
						echo $this->Form->input('issue_filling_date',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Issue Filling Date<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
						echo $this->Form->input('url',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Url<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
						echo $this->Form->input('description',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Description<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
					   ?>
                       
                      
                      
                          
                        
                          
                        </form>
                        <div class="col-md-12">
                      <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>Remove this patent',array('controller'=>'patents','action'=>'delete',$this->request->data['Patent']['id']),array('class'=>'pull-left','escape'=>false), __('Are you sure you want to delete # %s?',$this->request->data['Patent']['id'])); ?>
                         
                            <button class="btn btn-primary pull-right" type="button" id="submitCertificate">Save</button>
                            <?php echo $this->Html->link('Cancel',array('controller'=>'awards','action'=>'index'),array('class'=>'btn btn-primary pull-right mr10')) ?> 
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
        



<script type="text/javascript">
$(document).ready(function(){
						   
						   $('#submitCertificate').on('click',function(e){
																	   e.preventDefault();
																	   $("#PatentEditForm").submit();
																	   });
						   
						   
						   });
</script>





















<?php /*?><div class="patents form">
<?php echo $this->Form->create('Patent',array('class'=>'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add Patent'); ?></legend>
	<?php
		
		echo $this->Form->input('patent_office_id',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('title',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('patent_application_number',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('inventors',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('issue_filling_date',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('url',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
		echo $this->Form->input('description',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-3 control-label')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php */?>