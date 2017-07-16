<?php 
echo form_open($form['action'], $form['attributes']);
?>
<div class="modal-header bg-primary no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $pageHeading;?></h4>
</div>
<div class="modal-body">
	<div class="form-group">
        <div class="row category-wise-link">
            <div class="col-xs-6">
                <label class="control-label">Link Category</label>
                <?php echo form_dropdown('linkCategoryId', $linkCategoryDropdown, '', 'class="form-control link-category"');?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Parent Link</label>
                <?php echo form_dropdown('parentId', array('' => 'Select Link') + $linkDropdown, '', 'class="form-control link"');?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Link Name</label>
                <?php echo form_input(array('name' => 'name', 'class' => 'form-control'));?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Alias Name</label>
                <?php echo form_input(array('name' => 'alias', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Icon</label>
                <?php echo form_input(array('name' => 'icon', 'class' => 'form-control'));?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Hyperlink</label>
                <?php echo form_input(array('name' => 'href', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Actions</label>
                <?php echo form_input(array('name' => 'actions', 'class' => 'form-control'));?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<?php echo form_close();?>