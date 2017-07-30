<?php
$formAttributes = array(
    "data-fv-framework"=>"bootstrap",
    "data-fv-message"=>"This value is not valid",
    "data-fv-icon-valid"=>"null",
    "data-fv-icon-invalid"=>"glyphicon glyphicon-remove",
    "data-fv-icon-validating"=>"null"
);
$finalFormAttrs = $formAttributes + $form['attributes'];
echo form_open($form['action'], $finalFormAttrs);
?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $pageHeading;?> - <?php echo $jackpot->getTitle(); ?></h3>
      </div>
      <div class="panel-body">
            <div class="row pivot-wrapper">
                <div class="col-md-12 mbt10 inner-col-8p">
                    <div class="col-md-2">
                        <strong>Level Name</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Duration</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Prize Type</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Prize Value</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Default Given Bids</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Last Winner Percent</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Longest Winner Percent</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Min Players</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Min Wins To Unlock Next</strong>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <?php if(isset($levels) && count($levels) > 0) {
                    $i = 0;
                        foreach($levels as $level) {
                ?>
                    <div class="col-md-12 pivot-inner mbt10">
                        <div class="col-md-2">
                            <?php echo form_hidden('levels['.$i.'][battle_type]','NORMAL');?>
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getLevelName(),
                              'name' => 'levels['.$i.'][level_name]',
                              'class' => 'form-control',
                              'data-fv-row' => '.col-md-2',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Level Name Cannot Be Empty'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getDuration(),
                              'name' => 'levels['.$i.'][duration]',
                              'class' => 'form-control','data-fv-row' => '.col-md-1',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Please Enter Game Duration (In Seconds)',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Duration Seconds Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_dropdown('levels['.$i.'][prize_type]', array('MONEY' => 'MONEY', 'BID' => 'BID'), $level->getPrizeType(), 'class="form-control" data-fv-row=".col-md-2" data-fv-notempty="true" data-fv-notempty-message="Prize Type Cannot Be Empty"'); ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getPrizeValue(),
                              'name' => 'levels['.$i.'][prize_value]',
                              'class' => 'form-control',
                              'data-fv-row' => '.col-md-2',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Prize Value Cannot Be Empty',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Prize Value Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getDefaultAvailableBids(),
                              'name' => 'levels['.$i.'][default_bids]',
                              'class' => 'form-control','data-fv-row' => '.col-md-1',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Please Provide Some Default Bids To Play',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Available Bids Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getLastBidWinnerPercent(),
                              'name' => 'levels['.$i.'][last_bid_winner_percent]',
                              'class' => 'form-control',
                              'data-fv-row' => '.col-md-1',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Last Bid Winner Percent (In Case of Different)',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Percentage Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getLongestBidWinnerPercent(),
                              'name' => 'levels['.$i.'][longest_bid_winner_percent]',
                              'class' => 'form-control',
                              'data-fv-row' => '.col-md-1',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Longest Bid Winner Percent (In Case of Different)',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Percentage Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getMinPlayersRequiredToStart(),
                              'name' => 'levels['.$i.'][min_players_to_start]',
                              'class' => 'form-control',
                              'data-fv-row' => '.col-md-1',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Provide Minimum Players To Start The Game',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Value Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_input(array(
                              'type' => 'text',
                              'value' => $level->getMinWinsToUnlockNextLevel(),
                              'name' => 'levels['.$i.'][min_wins_to_unlock_next]',
                              'class' => 'form-control',
                              'data-fv-row' => '.col-md-1',
                              'data-fv-notempty' => 'true',
                              'data-fv-notempty-message'=>'Provide Minimum Wins Required To Unlock Next Level',
                              'data-fv-numeric' => 'true',
                              'data-fv-numeric-message' => 'Value Must Be Numeric',
                              'data-fv-numeric-thousandsseparator' => '',
                              'data-fv-numeric-decimalseparator' => '.'
                            )); ?>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn bg-purple btn-flat add <?php echo ($i > 0) ? 'hide' : '' ?>" style="margin-left: -12px;"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn bg-maroon btn-flat remove <?php echo ($i == 0) ? 'hide' : '' ?>" style="margin-left: -12px;"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                <?php $i++; } } else {?>
                        <div class="col-md-12 pivot-inner mbt10 inner-col-8p">
                            <div class="col-md-2">
                                <?php echo form_hidden('levels[0][battle_type]','NORMAL');?>
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][level_name]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-2',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Level Name Cannot Be Empty'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][duration]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-1',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Please Enter Game Duration (In Seconds)',
                                  'data-fv-numeric' => 'true',
                                  'data-fv-numeric-message' => 'Duration Seconds Must Be Numeric',
                                  'data-fv-numeric-thousandsseparator' => '',
                                  'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_dropdown('levels[0][prize_type]', array('MONEY' => 'MONEY', 'BID' => 'BID'), 'BID', 'class="form-control" data-fv-row=".col-md-2" data-fv-notempty="true" data-fv-notempty-message="Prize Type Cannot Be Empty"'); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][prize_value]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-2',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Prize Value Cannot Be Empty',
                                  'data-fv-numeric' => 'true',
                                  'data-fv-numeric-message' => 'Prize Value Must Be Numeric',
                                  'data-fv-numeric-thousandsseparator' => '',
                                  'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][default_bids]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-1',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Please Provide Some Default Bids To Play',
                                  'data-fv-numeric' => 'true',
                                  'data-fv-numeric-message' => 'Available Bids Must Be Numeric',
                                  'data-fv-numeric-thousandsseparator' => '',
                                  'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][last_bid_winner_percent]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-1',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Last Bid Winner Percent (In Case of Different)',
                                  'data-fv-numeric' => 'true',
                                  'data-fv-numeric-message' => 'Percent Must Be Numeric',
                                  'data-fv-numeric-thousandsseparator' => '',
                                  'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_input(array(
                                    'type' => 'text',
                                    'name' => 'levels[0][longest_bid_winner_percent]',
                                    'class' => 'form-control',
                                    'data-fv-row' => '.col-md-1',
                                    'data-fv-notempty' => 'true',
                                    'data-fv-notempty-message'=>'Longest Bid Winner Percent (In Case of Different)',
                                    'data-fv-numeric' => 'true',
                                    'data-fv-numeric-message' => 'Percent Must Be Numeric',
                                    'data-fv-numeric-thousandsseparator' => '',
                                    'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][min_players_to_start]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-1',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Provide Minimum Players To Start The Game',
                                  'data-fv-numeric' => 'true',
                                  'data-fv-numeric-message' => 'Value Must Be Numeric',
                                  'data-fv-numeric-thousandsseparator' => '',
                                  'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <?php echo form_input(array(
                                  'type' => 'text',
                                  'name' => 'levels[0][min_wins_to_unlock_next]',
                                  'class' => 'form-control',
                                  'data-fv-row' => '.col-md-1',
                                  'data-fv-notempty' => 'true',
                                  'data-fv-notempty-message'=>'Provide Minimum Wins Required To Unlock Next Level',
                                  'data-fv-numeric' => 'true',
                                  'data-fv-numeric-message' => 'Value Must Be Numeric',
                                  'data-fv-numeric-thousandsseparator' => '',
                                  'data-fv-numeric-decimalseparator' => '.'
                                )); ?>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn bg-purple btn-flat add" style="margin-left: -12px;"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn bg-maroon btn-flat remove hide" style="margin-left: -12px;"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                <div class="clearfix"></div>
                <?php } ?>
            </div>
      </div>
      <div class="panel-footer">
            <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
            <a href="<?php echo $form['cancelUrl'];?>" class="btn btn-danger">Cancel</a>
      </div>
<?php echo form_close();?>