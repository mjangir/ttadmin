<div class="register-box">
    <?php 
        if (isset($formErrors)) {
            foreach ($formErrors as $message) {
                echo '<div class="alert alert-danger">
                    <button aria-hidden="true" class="close" type="button">×</button>
                    '.$message.'
                </div>';
                break;
            }
        }
    ?>
    <div class="register-box-body">
        <p class="login-box-msg"><i class="fa fa-lock"></i><strong> Create Your Account</strong></p>

        <form action="<?php echo base_url('auth/register');?>" id="form-register" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo (isset($first_name)) ? $first_name : '' ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo (isset($last_name)) ? $last_name : '' ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($email)) ? $email : '' ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="confirm_password" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="terms"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <?php if (isset($settings['facebook_login_enabled']) && $settings['facebook_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/Facebook');
    ?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign Up using Facebook</a>
            <?php 
} ?>
            <?php if (isset($settings['google_login_enabled']) && $settings['google_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/Google');
    ?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign Up using Google</a>
            <?php 
} ?>
            <?php if (isset($settings['twitter_login_enabled']) && $settings['twitter_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/Twitter');
    ?>" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i> Sign Up using Twitter</a>
            <?php 
} ?>
            <?php if (isset($settings['linkedin_login_enabled']) && $settings['linkedin_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/LinkedIn');
    ?>" class="btn btn-block btn-social btn-linkedin btn-flat"><i class="fa fa-linkedin"></i> Sign Up using Linkedin</a>
            <?php 
} ?>
        </div>

        <a href="<?php echo base_url('auth/login');?>" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
</div>