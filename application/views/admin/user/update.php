<?php 
echo form_open($form['action'], $form['attributes']);
?>
<div class="modal-header bg-primary no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $pageHeading; ?></h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">User Role</label>
                <?php echo form_dropdown('roleId', $userRoleDropdown, $user->getUserGroup()->getRole()->getId(), 'class="form-control"'); ?>
            </div>
            <div class="col-xs-6">
                <label class="control-label">User Group</label>
                <?php echo form_dropdown('userGroupId', $userGroupDropdown, $user->getUserGroup()->getId(), 'class="form-control"'); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Name</label>
                <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => $user->getName()]); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Email</label>
                <?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => $user->getEmail()]); ?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Phone</label>
                <?php echo form_input(['name' => 'phone', 'class' => 'form-control', 'value' => $user->getPhone()]); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Gender</label>
                <?php
                    echo form_dropdown('gener', ['' => 'Select Gender', 'MALE' => 'Male', 'FEMALE' => 'Female'], $user->getGender(), 'class="form-control"');
                ?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Country</label>
                <?php
                    if ($user->getCountry() !== null) {
                        echo form_dropdown('countryId', $countryDropdown, $user->getCountry()->getId(), 'class="form-control"');
                    } else {
                        echo form_dropdown('countryId', $countryDropdown, '', 'class="form-control"');
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<?php echo form_close(); ?>