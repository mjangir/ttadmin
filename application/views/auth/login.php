<div class="login-box">
    <?php 
        if ($this->session->flashdata('formErrors')) {
            foreach ($this->session->flashdata('formErrors') as $message) {
                echo '<div class="alert alert-danger">
                    <button aria-hidden="true" class="close" type="button">×</button>
                    '.$message.'
                </div>';
                break;
            }
        }
    ?>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-lock"></i><strong> Login Into Your Account</strong></p>
        <form action="<?php echo base_url('auth/login') ?>" id="form-login" method="post">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <?php if (isset($settings['facebook_login_enabled']) && $settings['facebook_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/Facebook');
    ?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <?php 
} ?>
            <?php if (isset($settings['google_login_enabled']) && $settings['google_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/Google');
    ?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign in using Google</a>
            <?php 
} ?>
            <?php if (isset($settings['twitter_login_enabled']) && $settings['twitter_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/Twitter');
    ?>" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i> Sign in using Twitter</a>
            <?php 
} ?>
            <?php if (isset($settings['linkedin_login_enabled']) && $settings['linkedin_login_enabled'] == 1) {
    ?>
                <a href="<?php echo base_url('auth/social/LinkedIn');
    ?>" class="btn btn-block btn-social btn-linkedin btn-flat"><i class="fa fa-linkedin"></i> Sign in using Linkedin</a>
            <?php 
} ?>
        </div>
        <!-- /.social-auth-links -->

        <a href="<?php echo base_url('auth/forgot-password');?>">I forgot my password</a><br>
        <a href="<?php echo base_url('auth/register');?>" class="text-center">Create Your Account</a>

    </div>
    <!-- /.login-box-body -->
</div>