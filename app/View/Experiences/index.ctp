<div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Experiences</h4>
                    <?php echo $this->Html->link('Add Experience',array('controller'=>'experiences','action'=>'add'),array('class'=>'btn btn-primary btnc')) ?>
                  	
                </div>
                
                <?php foreach($UserExperience as $cert): ?>
                <div class="certificate">
                <?php echo $this->Html->link('Edit',array('controller'=>'experiences','action'=>'edit',$cert['UserExperience']['id']),array('class'=>'pull-right normallink')); ?>
                <h4 class="certificate-name"><?php echo $cert['Organization']['name']; ?></h4>
                 <span class="certificate-category"><?php echo $cert['Occupation']['name']; ?></span>
                 <span class="certificate-validity"><?php echo date('F,Y',strtotime($cert['UserExperience']['start_date']));?> - <?php echo date('F,Y',strtotime($cert['UserExperience']['end_date']));
				 ?></span>
                 <p><?php echo $cert['UserExperience']['description']; ?></p>
                
                   </div>
                <?php endforeach;?>
                
                
            </div>