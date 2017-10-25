<div class="login-box">
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
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-lock"></i><strong> Forgot Your Password???</strong></p>
        <form action="<?php echo base_url('auth/forgot-password') ?>" id="form-forgot-password" method="post">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="<?php echo base_url('auth/login'); ?>">Login Your Account</a>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>