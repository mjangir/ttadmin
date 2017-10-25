<?php 
echo form_open($form['action'], $form['attributes']);
?>
<div class="modal-header bg-info no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $pageHeading; ?></h4>
</div>
<div class="modal-body">
	<div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Old Password</label>
                <?php echo form_password(['name' => 'oldPassword', 'class' => 'form-control']); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">New Password</label>
                <?php echo form_password(['name' => 'newPassword', 'class' => 'form-control']); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Confirm Password</label>
                <?php echo form_password(['name' => 'confirmPassword', 'class' => 'form-control']); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<?php echo form_close(); ?>