<div class="col-md-4 abox">
            <div class="row">
                <div class="col-xs-3 col-md-3"></div>
                <img src="<?php echo $this->Html->url('/images/userpic.jpg'); ?>" class="col-xs-6 col-md-6 userprofilebg">
                <div class="col-xs-3 col-md-3"></div>
            </div>
            <div class="btm-line"></div>
            <div class="cntr-line"></div>
            <ul class="nav nav-pills nav-stacked usernavbar">
                <li class="heading"><div class="hor-line"></div><span class="icon-wall"></span> <a>Wall</a></li>
                <li class="heading"><div class="hor-line"></div><span class="icon-expertise"></span> <a>Expertise & Skills</a>
                    <ul class="usersubnav">
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Business Plan</a></li>
                    </ul>
                </li>
                <li class="heading"><div class="hor-line"></div><span class="icon-profile"></span> <a>Profile</a>
                    <ul class="usersubnav">
                        <li><?php  echo $this->Html->link('About me',array('controller'=>'users','action'=>'profile',AuthComponent::user('id')));?></li>
                        <li><?php  echo $this->Html->link('Experience',array('controller'=>'experiences','action'=>'index')); ?></li>
                       <li><?php  echo $this->Html->link('Educations',array('controller'=>'educations','action'=>'index'));?></li>
                        <li><?php  echo $this->Html->link('Certifications',array('controller'=>'certifications','action'=>'index'));?></li>
                        <li><?php  echo $this->Html->link('Patents',array('controller'=>'patents','action'=>'index'));?></li>
                         <li><?php  echo $this->Html->link('Awards',array('controller'=>'awards','action'=>'index'));?></li>
                        <li><a href="#">Connections</a></li>
                        <li><a href="#">Contact info</a></li>
                    </ul>
                </li>
            </ul>
        </div>