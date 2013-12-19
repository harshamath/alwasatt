
            <div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Patents</h4>
                    <?php echo $this->Html->link('Add Patent',array('controller'=>'patents','action'=>'add'),array('class'=>'btn btn-primary btnc')) ?>
                  	
                </div>
                
                <?php foreach($patents as $cert): ?>
                <div class="certificate">
                <?php echo $this->Html->link('Edit',array('controller'=>'patents','action'=>'edit',$cert['Patent']['id']),array('class'=>'pull-right normallink')); ?>
                <h4 class="certificate-name"><?php echo $cert['Patent']['title']; ?></h4>
                 <span class="certificate-category"><?php echo $cert['Patent']['patent_application_number']; ?></span>
                 <span class="certificate-validity">Filing Date - <?php echo date('jF,Y',strtotime($cert['Patent']['issue_filling_date']));
				 ?></span>
                 <p><?php echo $cert['Patent']['description']; ?>jkhgjgjgjgjgjhgkjjjjjjjjjjj hghjhgjghjghjgjhg</p>
                
                   </div>
                <?php endforeach;?>
                
                
            </div>
  