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
                        <label class="control-label">Template Name*</label>
                        <?php echo form_input(array('name' => 'templateName', 'class' => 'form-control', 'value' => $emailTemplate->getTemplateName()));?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Subject*</label>
                        <?php echo form_input(array('name' => 'subject', 'class' => 'form-control', 'value' => $emailTemplate->getSubject()));?>
                    </div>
               </div>
            </div>
            <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Alias Name*</label>
                        <?php echo form_input(array('name' => 'alias', 'class' => 'form-control', 'readonly' => 'readonly', 'value' => $emailTemplate->getAlias()));?>
                    </div>
                </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Content*</label>
                        <?php echo form_textarea(array('name' => 'content', 'class' => 'form-control wysihtml5', 'row' => '5', 'value' => $emailTemplate->getContent()));?>
                    </div>
               </div>
            </div>
      </div>
      <div class="panel-footer">
            <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
            <a href="<?php echo $form['cancelUrl'];?>" class="btn btn-danger">Cancel</a>
      </div>
<?php echo form_close();?>