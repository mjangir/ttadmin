<strong><i class="glyphicon glyphicon-phone"></i> Contact us regarding any query</strong><br/><br/>

<div class="row">
    <div class="col-xs-8 register-box-body">
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
        <p class="login-box-msg"><i class="fa fa-phone"></i><strong> Contact Us</strong></p>

        <form action="<?php echo base_url('page/contact'); ?>" id="form-contact" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?php echo (isset($subject)) ? $subject : '' ?>">
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo (isset($name)) ? $name : '' ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($email)) ? $email : '' ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo (isset($phone)) ? $phone : '' ?>">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <textarea class="form-control" name="message"><?php echo (isset($message)) ? $message : '' ?></textarea>
            </div>
            <div class="row">
                <div class="col-xs-2 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <div class="col-xs-4 pull-right">
        <div class="register-box-body">
            <strong>Contact Person:</strong> <?php echo $settings['contact_person']; ?><br/><br/>
            <strong>Contact Email:</strong> <?php echo $settings['contact_email']; ?><br/><br/>
            <strong>Contact Number:</strong> <?php echo $settings['contact_number']; ?><br/><br/>
            <strong>Fax Number:</strong> <?php echo $settings['fax_number']; ?><br/><br/>
            <strong>Contact Address:</strong> <?php echo $settings['contact_address']; ?><br/><br/>
        </div>
    </div>
</div>