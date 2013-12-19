<div class="header">
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-2 pull-left"> <a href="javascript:;" class="logo"></a> </div>
        <div class="col-xs-12 col-md-6 pull-left"> <div class="normal_menue">
        	<ul class="menu">
            	<li><a href="#">Stream</a></li>
                <li><a href="#">Companies</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">People</a></li>
            </ul>
        </div> </div>
        <div class="col-xs-12 col-md-4 pull-left">
        <div class="admin_menue">
        	<ul>
            	<li><a href="#" class="user">User</a></li>
                <li><a href="#" class="logo"><span>2</span></a></li>
                <li><a href="#" class="mail"><span>2</span></a></li>
                <li class="setting"><?php //echo AuthComponent::user('first_name').' '.AuthComponent::user('last_name') ?> <?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'))?></li>
            </ul>
        </div>
        </div>
    </div>
  </div>
</div>

<div class="top_search clearfix">
    <div class="form-group">
        <div class="container">
            <div class="col-xs-6 col-md-2 pl_0 pull-right">
                <span class="serach_advance">Advanced Search</span>
            </div>
            <div class="col-xs-6 col-md-4 pl_0 pull-right">
                <input type="email" placeholder="" id="inputEmail3" class="form-control search">
            </div>
        </div>
    </div>
</div>
