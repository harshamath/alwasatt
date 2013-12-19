<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
      echo $this->HTML->css('bootstrap.min.css');
      echo $this->HTML->css('theme.css');
      echo $this->HTML->css('custom.css');
      echo $this->HTML->css('reset.css');
?>

<title>ALWASATT</title>
<?php echo $this->HTML->script('jquery-1.10.2.js'); ?>

<script type="text/javascript">

function closePopUP(){
 $(".popUp").hide();
}

</script>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 pull-left"> <a href="javascript:;" class="logo"></a> </div>
        <div class="col-lg-6 pull-left"> <div class="normal_menue">
        	<ul class="menu">
            	<li><a href="#">Stream</a></li>
                <li><a href="#">Companies</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">People</a></li>
            </ul>
        </div> </div>
        <div class="col-lg-4 pull-left">
        <div class="admin_menue">
        	<ul>
            	<li><a href="#" class="user">User</a></li>
                <li><a href="#" class="logo"><span>2</span></a></li>
                <li><a href="#" class="mail"><span>2</span></a></li>
                <li class="setting"><a href="#">Liena Jonson</a></li>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!--container close here -->
</div>
<div class="top_search clearfix">
	 <div class="form-group">
              <div class="container">
              <div class="col-sm-5 pl_0">
              </div>
              <div class="col-sm-5 pl_0 ">
                <input type="email" placeholder="" id="inputEmail3" class="form-control search">

              </div>
                <span class="serach_advance">Advanced Search</span>
              </div>
            </div>

     </div>
    <div class="container">
      <div class="row">
      <div class="col-md-11">
   <div class="user_prof_wiz_cont col-md-3">
            <div class="sidebar_left">
        	<div class="user_info">
            	<div class="mb-10 clearfix">
            		<a href="#">
            		<?php echo $this->HTML->image('liena.jpg', array('alt' => 'Liena', 'class' => 'img-circle', 'escape' => false)); ?>
            		</a>
                	<h2><a href="#">Liena Jonson</a></h2>
                    <p>Web & Graphic Designer</p>
                </div>
                <a href="#" class="edit">Edit Profile</a>
            </div>
            <div class="clear"></div>
            <div class="share">
            	<h3>My Sphere</h3>
                <ul>
                	<li><a href="#" class="dashboard">My Dashboard</a></li>
                    <li><a href="#" class="connection">My Connections</a></li>
                    <li><a href="#" class="msgs">My Messages <span><?php echo $totalReceived;?> </span></a></li>
                    <li><a href="#" class="request">My Requests <span>2</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="clearfix">
            	<h3>My Jobs <a href="#">Matched (5)</a></h3>
                <div class="jobs">
                	<h5><a href="#">Software engineer required</a></h5>
                    <ul>
                        <li><a href="#">New Activities <strong>2</strong></a></li>
                        <li><a href="#">New comment from buyer <strong>8</strong></a></li>
                    </ul>
                </div>
                <div class="clear pad-5"></div>
                <div class="jobs">
                	<h5><a href="#">Software engineer required</a></h5>
                    <ul>
                        <li><a href="#">New Activities <strong>4</strong></a></li>
                        <li><a href="#">New comment from buyer <strong>1</strong></a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <div class="clearfix companies">
            	<h3>My Companies <a href="#">+</a></h3>
                <div class="pad-10 clearfix">
                    <p>Companies i’m member of:</p>
                    <ul>
                        <li><a href="#" class="grn1st">co</a></li>
                        <li><a href="#" class="orng">8</a></li>
                        <li><a href="#" class="grn2nd">5</a></li>
                    </ul>
                    <a href="#" class="float-r mt-10">View More</a>
                </div>
                <hr />
                <div class="pad-10 clearfix">
                    <p>Companies i’m following:</p>
                    <ul>
                        <li><a href="#" class="grn1st">co</a></li>
                        <li><a href="#" class="orng">8</a></li>
                        <li><a href="#" class="grn2nd">5</a></li>
                    </ul>
                    <a href="#" class="float-r mt-10">View More</a>
                </div>
            </div>
        </div>
        </div>
        <div class="user_prof2 col-md-8 ">
        <div class="center_content">
            <div class="clear pad-5"></div>
            <div class="wht_box_round grid_694">
            	<h4 class="ms">Messages</h4>
				<hr />
				 <div class="row1">
				   <div class="row_lft">
				     <ul class="msg">
					  <li><a href="#">Inbox</a></li><span class="arw"><?php $this->HTML->image('arw.png'); ?></span>
					   <li><a href="#">Sent</a></li>
					    <li><a href="#">Archive</a></li>
						 <li><a href="#">Trash</a></li>
					 </ul>
				   </div>
				   <div class="row_rgt">
				     <ul class="msg">
					  <li><a href="#">Compose Message</a></li>
					 </ul>
				   </div>
				 </div>

				 <div class="hr2"></div>
				 <div class="row2">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img-text">Select All</div>
					<div class="msg-img">
						<a href="#"><?php echo $this->HTML->image('delete-icon.png'); ?></a>
						<a href="#"><?php echo $this->HTML->image('icon-3.png'); ?></a>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li><a href="#">Filter Messages</a></li>
					 </ul>
				   </div>
				 </div>
				 <div class="hr2"></div>
				 <div class="row1" style="background:#f4f4f4;">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img"> <?php $this->HTML->image('default-img-m.png'); ?></div>
					<div class="msg-text">
						<p><b>Sender Name</b></p>
						<p style="color: #3F7DB6;"><b>Message Title...</b></p>
						<p>Message Text here..hello message text here...</p>
						<p><a href="#">Reply</a> &nbsp; <a href="#">Forward</a></p>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li>5:44 PM</li>
					  <li>
						 <a href="#"><?php $this->HTML->image('delete-icon.png'); ?></a>
						  <a href="#"> <?php $this->HTML->image('icon-3.png'); ?></a>
					  </li>
					 </ul>
				   </div>
				 </div>
                 <div class="hr2"></div>
				 <div class="row1">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img"><?php $this->HTML->image('default-img-m.png'); ?> </div>
					<div class="msg-text">
						<p><b>Sender Name</b></p>
						<p style="color: #3F7DB6;"><b>Message Title...</b></p>
						<p>Recommendation message here..recommendation message here...</p>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li>5:44 PM</li>
					 </ul>
				   </div>
				 </div>
				<div class="hr2"></div>
				 <div class="row1">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img"><?php echo $this->HTML->image('defult-img-m.png'); ?></div>
					<div class="msg-text">
						<p><b>Sender Name</b></p>
						<p style="color: #3F7DB6;"><b>Message Title...</b></p>
						<p>Recommendation message here..recommendation message here...</p>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li>5:44 PM</li>
					 </ul>
				   </div>
				 </div>
				 <div class="hr2"></div>
				 <div class="row1">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img"><?php echo $this->HTML->image('defult-img-m.png'); ?> </div>
					<div class="msg-text">
						<p><b>Sender Name</b></p>
						<p style="color: #3F7DB6;"><b>Message Title...</b></p>
						<p>Recommendation message here..recommendation message here...</p>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li>5:44 PM</li>
					 </ul>
				   </div>
				 </div>
				 <div class="hr2"></div>
				 <div class="row1">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img"><?php echo $this->HTML->image('defult-img-m.png'); ?></div>
					<div class="msg-text">
						<p><b>Sender Name</b></p>
						<p style="color: #3F7DB6;"><b>Message Title...</b></p>
						<p>Recommendation message here..recommendation message here...</p>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li>5:44 PM</li>
					 </ul>
				   </div>
				 </div>
				 <div class="hr2"></div>
				 <div class="row1">
				   <div class="row_lft">
				    <div class="icon-check"><input type="checkbox" /></div>
					<div class="icon-img"><?php echo $this->HTML->image('defult-img-m.png');?></div>
					<div class="msg-text">
						<p><b>Sender Name</b></p>
						<p style="color: #3F7DB6;"><b>Message Title...</b></p>
						<p>Recommendation message here..recommendation message here...</p>
					</div>

				   </div>
				   <div class="row_rgt">
				     <ul class="rgt-info">
					  <li>5:44 PM</li>
					 </ul>
				   </div>
				 </div>
				 	<div align="center"><a href="#" class="text_14">View More (50)</a></div>
                <div class="clear pad-5"></div>

            </div>
        </div>
        </div>

         </div>
      </div>

    <div class="footer">
    <div class="row">
      <div class="col-lg-9">
        <ul class="nav nav-pills">
          <li><a href="javascript:;">Home</a></li>
          <li><a href="javascript:;">Why Alwasatt</a></li>
          <li><a href="javascript:;">Contact Us</a></li>
          <li><a href="javascript:;">العربية</a></li>
        </ul>
        <div class="cntnt-footr"> <a class="click_img" href="javascript:;"> <?php $this->HTML->image('footer_logo.jpg'); ?> </a>
          <p> © Alwasatt 2010-2012 -By signing up and using Alwasatt, you are indicating that you have read,understood and agreed to the <a href="#">Tearms and Conditions</a> <a href="#">Copyright Policies,</a> and <a href="#">Confidentiality Agreement</a> of the website. </p>
        </div>
      </div>
      <div class="col-lg-3">
        <ul class="social">
          <li><a href="#" target="_blank" class="tw">Twitter</a></li>
          <li><a href="#" target="_blank" class="fb">Facebook</a></li>
          <li><a href="#" target="_blank" class="in">Linkedin</a></li>
        </ul>
      </div>
    </div>
  </div>
   </div>

</body>
</html>
