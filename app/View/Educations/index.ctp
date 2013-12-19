<div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Educations</h4>
                    <?php echo $this->Html->link('Add Education',array('controller'=>'educations','action'=>'add'),array('class'=>'btn btn-primary btnc')) ?>
                  	
                </div>
                
                <?php foreach($UserEducation as $cert): ?>
                <div class="certificate">
                <?php echo $this->Html->link('Edit',array('controller'=>'educations','action'=>'edit',$cert['UserEducation']['id']),array('class'=>'pull-right normallink')); ?>
                <h4 class="certificate-name"><?php echo $cert['EducationDegree']['name']; ?></h4>
                 <span class="certificate-category"><?php echo $cert['EducationMajor']['name']; ?></span>
                 <span class="certificate-validity"><?php echo date('F,Y',strtotime($cert['UserEducation']['start_date']));?> - <?php echo date('F,Y',strtotime($cert['UserEducation']['end_date']));
				 ?></span>
                 <p><?php echo $cert['EducationInstitute']['name']; ?></p>
                
                   </div>
                <?php endforeach;?>
                
                
            </div>