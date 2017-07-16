<?php 
echo form_open($form['action'], $form['attributes']);
?>
<div class="modal-header bg-primary no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $pageHeading;?></h4>
</div>
<div class="modal-body">
	<div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">User Role</label>
                <?php echo form_dropdown('roleId', $userRoleDropdown, '', 'class="form-control"');?>
            </div>
            <div class="col-xs-6">
                <label class="control-label">User Group</label>
                <?php echo form_dropdown('userGroupId', $userGroupDropdown, '', 'class="form-control"');?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Name</label>
                <?php echo form_input(array('name' => 'name', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Email</label>
                <?php echo form_input(array('name' => 'email', 'class' => 'form-control'));?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Phone</label>
                <?php echo form_input(array('name' => 'phone', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Password</label>
                <?php echo form_password(array('name' => 'password', 'class' => 'form-control'));?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Confirm Password</label>
                <?php echo form_password(array('name' => 'confirmPassword', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Gender</label>
                <?php
                    echo form_dropdown('gender', array('' => 'Select Gender', 'MALE' => 'Male', 'FEMALE' => 'Female'), '', 'class="form-control"');
                ?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Country</label>
                <?php echo form_dropdown('countryId', $countryDropdown, '', 'class="form-control"');?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<?php echo form_close();?>