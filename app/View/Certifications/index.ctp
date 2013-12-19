<div class="col-md-8">
            <div class="usercontactinfo">
                <ul class="nav nav-pills">
                  <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span> Dubai, UAE</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> +971562636576</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> email@alwasatt.com</a></li>
                </ul>
                <a href="#" class="pull-right normallink">Exit Edit</a>
            </div>
            <div class="abox mtop30">
                <div class="row">
                    <div class="col-md-7 media-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-9">
                                <div class="userdetail">
                                    <h4 class="media-heading">liena Jonson</h4>
                                    <span class="usercategory">Web & Graphic Designer</span>
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
        </div>