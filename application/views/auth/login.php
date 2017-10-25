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
    
        </div>
        <!-- /.social-auth-links -->

        <a href="<?php echo base_url('auth/forgot-password'); ?>">I forgot my password</a><br>

    </div>
    <!-- /.login-box-body -->
</div>