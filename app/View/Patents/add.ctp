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
                    <h4 class="media-heading">Patents</h4>
                </div>
                <div class="row">
                    <div class="user_prof_wiz_cont1 col-md-12">
                      <div class="col-md-11 col-md-offset-1">
                      <?php echo $this->Form->create('Patent',array('class'=>'form-horizontal','role'=>'form'));
					  
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
                      
                         
                            <button class="btn btn-primary pull-right" type="button" id="submitCertificate">Save</button>
                            <?php echo $this->Html->link('Cancel',array('controller'=>'patents','action'=>'index'),array('class'=>'btn btn-primary pull-right mr10')) ?> 
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
																	   $("#PatentAddForm").submit();
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