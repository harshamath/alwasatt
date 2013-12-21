<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 pull-left"> <a href="javascript:;" class="logo"></a> </div>
                <?php if (!$this->Session->read('Auth.User')) { ?>
                <div class="col-lg-2 pull-right text-left"> <a href="<?php echo $this->base . '/users/signup'; ?>" class="sign-up">Sign up</a> </div>
                <div class="col-lg-2 pull-right text-left"> <a href="<?php echo $this->base . '/users/company_signup'; ?>" class="sign-up">Company Sign up</a> </div>
                <div class="col-lg-1 pull-right text-left"> <a href="<?php echo $this->base . '/users/login'; ?>" class="sign-up">Login</a> </div>
                <?php } else { ?>
                <div class="col-lg-2 pull-right text-left"> <a href="<?php echo $this->base . '/users/logout'; ?>" class="sign-up">Logout</a> </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--container close here --> 
</div>