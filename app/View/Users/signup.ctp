<div id="login_page">
    <div class="row">
        <div class="col-lg-12 col-md-12 ">
            <div class="col-lg-7 col-md-7 ">
                <h1>Create Your Account on Alwasatt Today</h1>
                <?php echo $this->Session->flash(); ?>
                <form class="form-horizontal" role="form" action="<?php echo $this->base;?>/users/signup" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">First Name<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="text" name="firstname" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Last Name<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="text" name="lastname" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label ">Email<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="email" name="email_address" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label ">Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 dot_adjust">Confirm Your Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="confirm_password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label ">&nbsp;</label>
                        <div class="col-sm-8 pl_0">
                            <button class="btn btn-primary btn-lg text-center" type="submit" id="btn_signup">Create Account</button>
                        </div>
                    </div>
                </form>
                <P>&nbsp;</P>
                <div class="bottom">
                    <p>All items marked with red strip (<span>*</span>) are required.</p>
                </div>
            </div>
        </div>
    </div>
</div>