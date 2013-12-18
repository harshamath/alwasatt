<div id="login_page">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <h1>Change Your Password</h1>
                <?php echo $this->Session->flash(); ?>

                <form class="form-horizontal" role="form" action="<?php echo $this->base; ?>/users/reset_password_token" method="post">
                    <?php echo $this->Form->hidden('User.reset_password_token'); ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="data[User][new_passwd]" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">Confirm Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="data[User][confirm_passwd]" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">&nbsp;</label>
                        <div class="col-sm-8 pl_0">
                            <button class="btn btn-primary btn-lg" type="submit" id="btn_login_user">Change Password</button>
                        </div>                        
                    </div>
                </form>
                <div class="mnhight"></div>
                <div class="bottom">
                    <p>All items marked with red strip (<span>*</span>) are required.</p>
                </div>
            </div>
        </div>
    </div>
</div>