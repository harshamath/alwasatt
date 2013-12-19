
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Awards</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                     <?php echo $this->Form->create('Award',array('class'=>'form-horizontal'));
					 echo $this->Form->hidden('id');
					 ?>
                     
                     <?php  
					 
					   echo $this->Form->input('title',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Title<i class="red_dot">&bull;</i>')),array('escape'=>false));
					   
					   echo $this->Form->input('occupation_id',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Occupation<i class="red_dot">&bull;</i>')),array('escape'=>false));
					   
					    echo $this->Form->input('issuer',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Issuer<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
						echo $this->Form->input('award_date',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Award Date<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
						echo $this->Form->input('description',array('class'=>'form-control','between'=>'<div class="col-md-5 pl_0">','after'=>'</div>','div'=>'form-group','label'=>array('class'=>'col-md-4 control-label','text'=>'Description<i class="red_dot">&bull;</i>')),array('escape'=>false));
						
					   ?>
                          
                        </form>
                        <div class="col-md-12">
                      <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>Remove this Award',array('controller'=>'awards','action'=>'delete',$this->request->data['Award']['id']),array('class'=>'pull-left','escape'=>false), __('Are you sure you want to delete # %s?',$this->request->data['Award']['id'])); ?>
                         
                            <button class="btn btn-primary pull-right" type="button" id="submitCertificate">Save</button>
                            <?php echo $this->Html->link('Cancel',array('controller'=>'patents','action'=>'index'),array('class'=>'btn btn-primary pull-right mr10')) ?> 
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
           






<script type="text/javascript">
$(document).ready(function(){
						   
						   $('#submitCertificate').on('click',function(e){
																	   e.preventDefault();
																	   $("#AwardEditForm").submit();
																	   });
						   
						   
						   });
</script>




<?php /*?><div class="awards form">
<?php echo $this->Form->create('Award'); ?>
	<fieldset>
		<legend><?php echo __('Edit Award'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('occupation_id');
		echo $this->Form->input('issuer');
		echo $this->Form->input('award_date');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Award.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Award.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Awards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('controller' => 'occupations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('controller' => 'occupations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php */?>