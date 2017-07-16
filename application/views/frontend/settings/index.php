<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#profile" data-toggle="tab">Update Profile</a></li>
                    <li><a href="#changepwd" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    
                    <div class="active tab-pane" id="profile">
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
                        <form class="form-horizontal" id="form-user-profile" action="<?php echo base_url('settings/updateprofile');?>" method="post">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Full Name*</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="<?php echo $name;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" disabled="disabled" value="<?php echo $email;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-3">
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="MALE" <?php echo ($gender == 'MALE') ? 'selected="selected"' : ''; ?>>Male</option>
                                        <option value="FEMALE" <?php echo ($gender == 'FEMALE') ? 'selected="selected"' : ''; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birth_date" class="col-sm-3 control-label">Birth Date</label>
                                <div class="col-sm-3">
                                    <input class="form-control datepicker" type="date" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birthDate;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-3 control-label">Country</label>
                                <div class="col-sm-3">
                                    <select name="country" class="form-control">
                                        <?php foreach ($countries as $id => $value) {
    $selected = ($id == $country) ? 'selected="selected"' : '';
    ?>
                                        <option value="<?php echo $id;
    ?>" <?php echo $selected;
    ?>><?php echo $value;
    ?></option>
                                        <?php 
} ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="tab-pane" id="changepwd">
                        <form class="form-horizontal" id="form-reset-password" action="<?php echo base_url('settings/changepassword');?>" method="post">
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Retype Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>