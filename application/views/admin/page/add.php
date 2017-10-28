<?php 
echo form_open($form['action'], $form['attributes']);
?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $pageHeading; ?></h3>
      </div>
      <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Page Name*</label>
                        <?php echo form_input(['name' => 'name', 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Page Title*</label>
                        <?php echo form_input(['name' => 'title', 'class' => 'form-control']); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Page Alias*</label>
                        <?php echo form_input(['name' => 'alias', 'class' => 'form-control']); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Content*</label>
                        <?php echo form_textarea(['name' => 'content', 'class' => 'form-control wysihtml5', 'row' => '5']); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Meta Keywords</label>
                        <?php echo form_textarea(['name' => 'metaKeywords', 'class' => 'form-control', 'style' => 'height:50px']); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Meta Description</label>
                        <?php echo form_textarea(['name' => 'metaDescription', 'class' => 'form-control', 'style' => 'height:80px']); ?>
                    </div>
               </div>
            </div>
      </div>
      <div class="panel-footer">
            <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
            <a href="<?php echo $form['cancelUrl']; ?>" class="btn btn-danger">Cancel</a>
      </div>
<?php echo form_close(); ?>