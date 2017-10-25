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
                <label class="control-label">Link Category</label>
                <?php echo form_dropdown('linkCategoryId', $linkCategoryDropdown, $link->getLinkCategory()->getId(), 'class="form-control"'); ?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Parent Link</label>
                <?php echo form_dropdown('parentId', ['' => 'Select Link'] + $linkDropdown, $link->getParentId(), 'class="form-control"'); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Link Name</label>
                <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => $link->getName()]); ?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Alias Name</label>
                <?php echo form_input(['name' => 'alias', 'class' => 'form-control', 'value' => $link->getAlias()]); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Icon</label>
                <?php echo form_input(['name' => 'icon', 'class' => 'form-control', 'value' => $link->getIcon()]); ?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Hyperlink</label>
                <?php echo form_input(['name' => 'href', 'class' => 'form-control', 'value' => $link->getHref()]); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <label class="control-label">Actions</label>
                <?php echo form_input(['name' => 'actions', 'class' => 'form-control', 'value' => $link->getActions()]); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<?php echo form_close(); ?>