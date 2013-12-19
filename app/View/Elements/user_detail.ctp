<div class="usercontactinfo">
                <ul class="nav nav-pills">
                  <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span> Dubai, UAE</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> +971562636576</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span><?php echo AuthComponent::user('email'); ?></a></li>
                </ul>
                <a href="#" class="pull-right normallink">Exit Edit</a>
            </div>
            <div class="abox mtop30">
                <div class="row">
                    <div class="col-md-7 media-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-9">
                                <div class="userdetail">
                                    <h4 class="media-heading"><?php echo AuthComponent::user('first_name').' '.AuthComponent::user('last_name')?> </h4>
                                    <span class="usercategory"><?php echo AuthComponent::user('title'); ?></span>
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
                            <li><a href="#">Experience</a><img src="<?php echo $this->Html->url('/images/experience.png'); ?>"><p><b>7</b> years</p></li>
                            <li><a href="#">Education</a><img src="<?php echo $this->Html->url('/images/education.png'); ?>"><p>Bachelors</p></li>
                        </ul>
                    </div>
                </div>
            </div>