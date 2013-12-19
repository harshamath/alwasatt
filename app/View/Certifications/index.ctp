
            
            
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Certifications</h4>
                    <?php echo $this->Html->link('Add Certification',array('controller'=>'certifications','action'=>'add'),array('class'=>'btn btn-primary btnc')) ?>
                  	
                </div>
                
                <?php foreach($certifications as $cert): ?>
                <div class="certificate">
                <?php echo $this->Html->link('Edit',array('controller'=>'certifications','action'=>'edit',$cert['Certification']['id']),array('class'=>'pull-right normallink')); ?>
                <h4 class="certificate-name"><?php echo $cert['Certification']['certification_name']; ?></h4>
                 <span class="certificate-category"><?php echo $cert['Certification']['certificatiob_authority']; ?></span>
                 <span class="certificate-validity"><?php echo date('F,Y',strtotime($cert['Certification']['certification_start_date']));?> - <?php echo date('F,Y',strtotime($cert['Certification']['certification_end_date']));
				 ?></span>
                 <p><?php echo $cert['Certification']['description']; ?>jkhgjgjgjgjgjhgkjjjjjjjjjjj hghjhgjghjghjgjhg</p>
                 <div class="alert alert-success">
                        <h4 class="certificate-name">Related Skills & Expertise</h4>
                        <a class="certificate-tag" href="#">#photoshop</a>
                        <a class="certificate-tag" href="#">#Illustrator</a>
                        <a class="certificate-tag" href="#">#Adobe</a>
                        <a class="certificate-tag" href="#">#Deramweaver</a>
                        <a class="certificate-tag" href="#">#Indesign</a>
                        <a class="certificate-tag" href="#">#Sofwares</a>
                    </div>
                   </div>
                <?php endforeach;?>
                
                
            </div>
  