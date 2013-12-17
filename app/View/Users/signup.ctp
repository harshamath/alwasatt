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
                            <samp>or</samp>
                            <a href="javascript:void(0)" id="facebookLogin" class="login_fb"><img src="<?= $this->base?>/images/fb_login.png" height="46px" alt="Login with Facebook" title="Login with Facebook" /></a>
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
<div id="fb-root"> </div>
<script>
$(document).ready(function() {
    $("#facebookLogin").click(function() {
        facebook_loginPopup();
    });
});


window.fbAsyncInit = function() {
    FB.init({
        appId: '707432672600105', // App ID                
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true, // parse XFBML
        oauth: true
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function facebook_loginPopup()
{
    FB.login(function(response) {
//        console.log(response);

        if (response.authResponse && response.status == "connected") {
            FB.api('/me?fields=id, name,email,first_name,last_name,birthday,gender,picture,location', function(response) {
                var uid = response.id;
                if (typeof uid == "undefined") {
//                    $("#rsp").addClass("error_panel");
//                    $("#rsp").html("facebook connection error.");
                }
//                console.log(response);
                var uid = response.id;
                var email = response.email;
                var first_name = response.first_name;
                var last_name = response.last_name;
                var gender = response.gender;
                var birthday = response.birthday;
                //PROFILE PHOTO
                var picture = response.picture;
                var profile_photo = picture.data.url;
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->base . '/users/signup_facebook'; ?>",
                    data: {"uid": uid, "email": email, "first_name": first_name, "last_name": last_name, "gender": gender, "birthday": birthday, "profile_photo": profile_photo},
                    dataType: "json"
                }).success(function(rsp) {
                    if (rsp.status == true) {
                        window.location = "<?php echo $this->base . '/users/complete_profile'; ?>";
                    } else {
                        alert('Error: ' + rsp.message);
                    }
                });
            });
        } else {
            if (response.status == null) {
//                $("#rsp").addClass("error_panel");
//                $("#rsp").html("Facebook Connection Error.");
            }
        }
    }, {scope: 'email, user_birthday'});
}
</script>