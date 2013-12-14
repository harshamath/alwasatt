<div id="login_page">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <h1>Sign in to Your Alwasatt Account</h1>
                <?php echo $this->Session->flash(); ?>
                <form class="form-horizontal" role="form" action="<?php echo $this->base;?>/users/login" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">Email Address<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="email" name="username" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">&nbsp;</label>
                        <div class="col-sm-8 pl_0">
                            <label class="remember">
                                <input type="checkbox" />
                                Remember me</label>
                            <span>|</span> <a href="javascript:;">Forgot my Password</a> </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label authorty">&nbsp;</label>
                        <div class="col-sm-8 pl_0">
                            <button class="btn btn-primary btn-lg" type="submit" id="btn_login_user">Sign in</button>
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