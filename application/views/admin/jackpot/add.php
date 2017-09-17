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
                        <label class="control-label">Jackpot Title*</label>
                        <?php echo form_input(array('name' => 'title', 'class' => 'form-control'));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Jackpot Amount*</label>
                        <?php echo form_input(array('name' => 'amount', 'class' => 'form-control'));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Minimum Players Required To Start*</label>
                        <?php echo form_input(array('name' => 'min_players_required', 'type' => 'number', 'min' => '1', 'class' => 'form-control', 'value' => 1));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Game Clock Time*</label>
                        <?php echo form_input(array('name' => 'game_clock_time', 'class' => 'form-control timepicker'));?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Dooms Day Clock Time*</label>
                        <?php echo form_input(array('name' => 'dooms_day_time', 'class' => 'form-control timepicker'));?>
                    </div>
               </div>
            </div>
      </div>
      <div class="panel-footer">
            <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
            <a href="<?php echo $form['cancelUrl'];?>" class="btn btn-danger">Cancel</a>
      </div>
<?php echo form_close();?>