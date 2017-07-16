<?php 
echo form_open($form['action'], $form['attributes']);
?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $pageHeading;?></h3>
      </div>
      <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Page Name*</label>
                        <?php echo form_input(array('name' => 'name', 'class' => 'form-control', 'value' => $page->getName()));?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Page Title*</label>
                        <?php echo form_input(array('name' => 'title', 'class' => 'form-control', 'value' => $page->getTitle()));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Content*</label>
                        <?php echo form_textarea(array('name' => 'content', 'class' => 'form-control wysihtml5', 'row' => '5', 'value' => $page->getContent()));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Meta Keywords</label>
                        <?php echo form_textarea(array('name' => 'metaKeywords', 'class' => 'form-control', 'style' => 'height:50px', 'value' => $page->getMetaKeywords()));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Meta Description</label>
                        <?php echo form_textarea(array('name' => 'metaDescription', 'class' => 'form-control', 'style' => 'height:80px', 'value' => $page->getMetaDescription()));?>
                    </div>
               </div>
            </div>
      </div>
      <div class="panel-footer">
            <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
            <a href="<?php echo $form['cancelUrl'];?>" class="btn btn-danger">Cancel</a>
      </div>
<?php echo form_close();?>