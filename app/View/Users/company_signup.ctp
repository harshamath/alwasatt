<div id="login_page">
    <div class="row">
        <div class="col-lg-12 col-md-12 ">
            <div class="col-lg-7 col-md-7 ">
                <h1 style="font-size: 26px;">Create Your Company Account on Alwasatt Today</h1>
                <?php echo $this->Session->flash(); ?>
                <form class="form-horizontal" role="form" action="<?php echo $this->base;?>/users/company_signup" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="text" name="first_name" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="text" name="last_name" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label ">Email<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="email" name="email" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label ">Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 dot_adjust">Confirm Your Password<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="password" name="confirm_password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 dot_adjust">Company Name<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="text" name="company_name" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label ">&nbsp;</label>
                        <div class="col-sm-8 pl_0">
                            <button class="btn btn-primary btn-lg text-center" type="submit" id="btn_signup">Create Company Account</button>
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