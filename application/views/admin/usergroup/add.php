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
            <div class="col-xs-12">
                <label class="control-label">Group Name</label>
                <?php echo form_input(array('name' => 'groupName', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">User Role</label>
                <?php echo form_dropdown('roleId', $userRoleDropdown, '', 'class="form-control"');?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Alias</label>
                <?php echo form_input(array('name' => 'alias', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Description</label>
                <?php echo form_textarea(array('name' => 'description', 'class' => 'form-control', 'rows' => '3'));?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<?php echo form_close();?>