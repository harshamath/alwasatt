<div id="login_page">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <h1>Sign in to Your Alwasatt Account</h1>
                <?php echo $this->Session->flash(); ?>
                <form class="form-horizontal" role="form" action="<?php echo $this->base; ?>/users/login" method="post">
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
                            <samp>or</samp>
                            <a href="javascript:void(0)" id="facebookLogin" class="login_fb"><img src="<?= $this->base ?>/images/fb_login.png" height="46px" alt="Login with Facebook" title="Login with Facebook" /></a>
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
                //console.log(response);
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