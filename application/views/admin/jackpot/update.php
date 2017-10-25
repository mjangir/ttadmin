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
                        <label class="control-label">Jackpot Title*</label>
                        <?php echo form_input(['name' => 'title', 'class' => 'form-control', 'value' => $jackpot->getTitle()]); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Jackpot Amount*</label>
                        <?php echo form_input(['name' => 'amount', 'class' => 'form-control', 'value' => $jackpot->getAmount()]); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Minimum Players Required To Start*</label>
                        <?php echo form_input(['name' => 'min_players_required', 'type' => 'number', 'min' => '1', 'class' => 'form-control', 'value' => $jackpot->getMinPlayersRequired()]); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Game Clock Time*</label>
                        <?php echo form_input(['name' => 'game_clock_time', 'class' => 'form-control timepicker', 'value' => convertSecondsToTimeFormat($jackpot->getGameClockTime())]); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="control-label">Dooms Day Clock Time*</label>
                        <?php echo form_input(['name' => 'dooms_day_time', 'class' => 'form-control timepicker', 'value' => convertSecondsToTimeFormat($jackpot->getDoomsDayTime())]); ?>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="control-label">Jackpot Game Duration 
                          <small><i>At how many seconds, what amount should be increased</i></small>
                        </h3>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label class="control-label">Every Below Seconds</label>
                        <?php echo form_input(['type' => 'number', 'name' => 'increase_amount_seconds', 'class' => 'form-control', 'value' => $jackpot->getIncreaseAmountSeconds()]); ?>
                    </div>
                    <div class="col-xs-4">
                        <label class="control-label">Below Amount Should Be Increased</label>
                        <?php echo form_input(['type' => 'number', 'name' => 'increase_amount', 'class' => 'form-control', 'value' => $jackpot->getIncreaseAmount()]); ?>
                    </div>
               </div>
            </div>
            <!-- <div class="row pivot-wrapper">
                <div class="col-md-12 inner-col-8p">
                    <div class="col-md-2">
                        <strong>Seconds</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Amount</strong>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                <?php
                  $dsStatus = false;
                  if ($jackpot->getDurationSetting() && !empty($jackpot->getDurationSetting())) {
                      $dsStatus = true;
                      $durationSettings = json_decode($jackpot->getDurationSetting(), true);
                      if (is_array($durationSettings) && !empty($durationSettings)) {
                          $dsStatus = true;
                          $i = 0;
                          foreach ($durationSettings as $ds) {
                              ?>
                <div class="col-md-12 pivot-inner mbt10 inner-col-8p">
                    <div class="col-md-2">
                      <?php 
                        // echo form_input(array(
                        //   'type'                    => 'text',
                        //   'name'                    => 'duration_setting['.$i.'][seconds]',
                        //   'value'                   => $ds['seconds'],
                        //   'class'                   => 'form-control',
                        //   'data-fv-row'             => '.col-md-2',
                        //   'data-fv-notempty'        => 'true',
                        //   'data-fv-notempty-message'=>'Seconds cannot be empty',
                        //   'data-fv-numeric'         => 'true',
                        //   'data-fv-numeric-message' => 'Duration Seconds Must Be Numeric',
                        //   'data-fv-numeric-thousandsseparator' => '',
                        //   'data-fv-numeric-decimalseparator' => '.'
                        // ));
                      ?>
                    </div>
                    <div class="col-md-2">
                      <?php 
                        // echo form_input(array(
                        //   'type'                    => 'text',
                        //   'name'                    => 'duration_setting['.$i.'][amount]',
                        //   'value'                   => $ds['amount'],
                        //   'class'                   => 'form-control',
                        //   'data-fv-row'             => '.col-md-2',
                        //   'data-fv-notempty'        => 'true',
                        //   'data-fv-notempty-message'=> 'Amount Cannot Be Empty',
                        //   'data-fv-numeric'         => 'true',
                        //   'data-fv-numeric-message' => 'Amount Must Be Numeric',
                        //   'data-fv-numeric-thousandsseparator' => '',
                        //   'data-fv-numeric-decimalseparator' => '.'
                        // ));
                      ?>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn bg-purple btn-flat add <?php echo ($i > 0) ? 'hide' : '' ?>" style="margin-left: -12px;"><i class="fa fa-plus"></i></button>
                      <button type="button" class="btn bg-maroon btn-flat remove <?php echo ($i == 0) ? 'hide' : '' ?>" style="margin-left: -12px;"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <?php
                $i++;
                          }
                      }
                  }

                  if ($dsStatus == false) {
                      ?>
                <div class="col-md-12 pivot-inner mbt10 inner-col-8p">
                    <div class="col-md-2">
                      <?php 
                        // echo form_input(array(
                        //   'type'                    => 'text',
                        //   'name'                    => 'duration_setting[0][seconds]',
                        //   'value'                   => 0,
                        //   'class'                   => 'form-control',
                        //   'data-fv-row'             => '.col-md-2',
                        //   'data-fv-notempty'        => 'true',
                        //   'data-fv-notempty-message'=>'Seconds cannot be empty',
                        //   'data-fv-numeric'         => 'true',
                        //   'data-fv-numeric-message' => 'Duration Seconds Must Be Numeric',
                        //   'data-fv-numeric-thousandsseparator' => '',
                        //   'data-fv-numeric-decimalseparator' => '.'
                        // ));
                      ?>
                    </div>
                    <div class="col-md-2">
                      <?php 
                        // echo form_input(array(
                        //   'type'                    => 'text',
                        //   'name'                    => 'duration_setting[0][amount]',
                        //   'value'                   => 0,
                        //   'class'                   => 'form-control',
                        //   'data-fv-row'             => '.col-md-2',
                        //   'data-fv-notempty'        => 'true',
                        //   'data-fv-notempty-message'=> 'Amount Cannot Be Empty',
                        //   'data-fv-numeric'         => 'true',
                        //   'data-fv-numeric-message' => 'Amount Must Be Numeric',
                        //   'data-fv-numeric-thousandsseparator' => '',
                        //   'data-fv-numeric-decimalseparator' => '.'
                        // ));
                      ?>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn bg-purple btn-flat add" style="margin-left: -12px;"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn bg-maroon btn-flat remove hide" style="margin-left: -12px;"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <?php
                  } ?>
                <div class="clearfix"></div>
            </div> -->
      </div>
      <div class="panel-footer">
            <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
            <a href="<?php echo $form['cancelUrl']; ?>" class="btn btn-danger">Cancel</a>
      </div>
<?php echo form_close(); ?>