<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="<?php echo $saveUrl;
    ?>" id="setting-application-form">
                    <div class="panel panel-square panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">General Setting</h3>
                        </div>
                        <div class="panel-body">
                            <label><strong>Application Name</strong></label>
                            <input type="text" name="settings[application_name]" value="<?php echo $settings['application_name'] ?>" class="form-control" />
                            <label class="mtp10"><strong>Admin Copyright Text</strong></label>
                            <input type="text" name="settings[admin_copyright_text]" value="<?php echo $settings['admin_copyright_text'] ?>" class="form-control" />
                            <label class="mtp10"><strong>Frontend Copyright Text</strong></label>
                            <input type="text" name="settings[frontend_copyright_text]" value="<?php echo $settings['frontend_copyright_text'] ?>" class="form-control" />
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <form method="post" action="<?php echo $saveUrl;
    ?>" id="setting-homepage-form">
                    <div class="panel panel-square panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Home Page Setting</h3>
                        </div>
                        <div class="panel-body">
                            <label><strong>Home Page Title</strong></label>
                            <input type="text" name="settings[homepage_meta_title]" value="<?php echo $settings['homepage_meta_title'] ?>" class="form-control" />
                            <label class="mtp10"><strong>Meta Description</strong></label>
                            <input type="text" name="settings[homepage_meta_description]" value="<?php echo $settings['homepage_meta_description'] ?>" class="form-control" />
                            <label class="mtp10"><strong>Meta Keywords</strong></label>
                            <input type="text" name="settings[homepage_meta_keywords]" value="<?php echo $settings['homepage_meta_keywords'] ?>" class="form-control" />
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="<?php echo $saveUrl; ?>" id="setting-application-form">
                    <div class="panel panel-square panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jackpot Setting</h3>
                        </div>
                        <div class="panel-body">
                            <label><strong>Default Bids Per User Per Game</strong></label>
                            <input type="text" name="settings[jackpot_setting_default_bid_per_user_per_game]" value="<?php echo $settings['jackpot_setting_default_bid_per_user_per_game'] ?>" class="form-control" />

                            <label class="mtp10"><strong>Game Clock Seconds Increment On Bid</strong></label>
                            <input type="text" name="settings[jackpot_setting_game_clock_seconds_increment_on_bid]" value="<?php echo $settings['jackpot_setting_game_clock_seconds_increment_on_bid'] ?>" class="form-control" />
                            
                            <label class="mtp10"><strong>Amount Percent To Longest Bid User</strong></label>
                            <input type="text" name="settings[jackpot_setting_longest_bid_percent_amount]" value="<?php echo $settings['jackpot_setting_longest_bid_percent_amount'] ?>" class="form-control" />
                            
                            <label class="mtp10"><strong>Amount Percent To Last Bid User</strong></label>
                            <input type="text" name="settings[jackpot_setting_last_bid_percent_amount]" value="<?php echo $settings['jackpot_setting_last_bid_percent_amount'] ?>" class="form-control" />
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    $formAttributes = [
                        'data-fv-framework'      => 'bootstrap',
                        'data-fv-message'        => 'This value is not valid',
                        'data-fv-icon-valid'     => 'null',
                        'data-fv-icon-invalid'   => 'glyphicon glyphicon-remove',
                        'data-fv-icon-validating'=> 'null',
                        'id'                     => 'form_normal_battle_levels',
                    ];
                    echo form_open($saveUrl, $formAttributes);
                ?>
                    <div class="panel panel-square panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Default Normal Bid Battle Levels For Jackpot</h3>
                            <input type="hidden" name="normal_battle_levels" value="1">
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
                                        <strong>Prize Bids</strong>
                                    </div>
                                    <div class="col-md-1">
                                        <strong>Default Given Bids</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Last Winner Percent</strong>
                                    </div>
                                    <div class="col-md-2">
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
                                <?php 
                                $normalBattleLevels = isset($settings['normal_battle_levels_json']) ? json_decode($settings['normal_battle_levels_json'], true) : null;
                                if ($normalBattleLevels && is_array($normalBattleLevels) && count($normalBattleLevels) > 0) {
                                    $i = 0;
                                    foreach ($normalBattleLevels as $level) {
                                        ?>
                                    <div class="col-md-12 pivot-inner mbt10">
                                        <div class="col-md-2">
                                            <?php echo form_hidden('levels['.$i.'][battle_type]', 'NORMAL'); ?>
                                            <?php echo form_input([
                                              'type'                    => 'text',
                                              'value'                   => $level['level_name'],
                                              'name'                    => 'levels['.$i.'][level_name]',
                                              'class'                   => 'form-control',
                                              'data-fv-row'             => '.col-md-2',
                                              'data-fv-notempty'        => 'true',
                                              'data-fv-notempty-message'=> 'Level Name Cannot Be Empty',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-1">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['duration'],
                                              'name'                               => 'levels['.$i.'][duration]',
                                              'class'                              => 'form-control', 'data-fv-row' => '.col-md-1',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Please Enter Game Duration (In Seconds)',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Duration Seconds Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                            <?php echo form_hidden('levels['.$i.'][prize_type]', 'BID'); ?>
                                        </div>
                                        <div class="col-md-1">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['prize_value'],
                                              'name'                               => 'levels['.$i.'][prize_value]',
                                              'class'                              => 'form-control',
                                              'data-fv-row'                        => '.col-md-1',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Prize Value Cannot Be Empty',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Prize Value Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-1">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['default_bids'],
                                              'name'                               => 'levels['.$i.'][default_bids]',
                                              'class'                              => 'form-control', 'data-fv-row' => '.col-md-1',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Please Provide Some Default Bids To Play',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Available Bids Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-2">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['last_bid_winner_percent'],
                                              'name'                               => 'levels['.$i.'][last_bid_winner_percent]',
                                              'class'                              => 'form-control',
                                              'data-fv-row'                        => '.col-md-2',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Last Bid Winner Percent (In Case of Different)',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Percentage Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-2">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['longest_bid_winner_percent'],
                                              'name'                               => 'levels['.$i.'][longest_bid_winner_percent]',
                                              'class'                              => 'form-control',
                                              'data-fv-row'                        => '.col-md-2',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Longest Bid Winner Percent (In Case of Different)',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Percentage Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-1">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['min_players_to_start'],
                                              'name'                               => 'levels['.$i.'][min_players_to_start]',
                                              'class'                              => 'form-control',
                                              'data-fv-row'                        => '.col-md-1',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Provide Minimum Players To Start The Game',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Value Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-1">
                                            <?php echo form_input([
                                              'type'                               => 'text',
                                              'value'                              => $level['min_wins_to_unlock_next'],
                                              'name'                               => 'levels['.$i.'][min_wins_to_unlock_next]',
                                              'class'                              => 'form-control',
                                              'data-fv-row'                        => '.col-md-1',
                                              'data-fv-notempty'                   => 'true',
                                              'data-fv-notempty-message'           => 'Provide Minimum Wins Required To Unlock Next Level',
                                              'data-fv-numeric'                    => 'true',
                                              'data-fv-numeric-message'            => 'Value Must Be Numeric',
                                              'data-fv-numeric-thousandsseparator' => '',
                                              'data-fv-numeric-decimalseparator'   => '.',
                                            ]); ?>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn bg-purple btn-flat add <?php echo ($i > 0) ? 'hide' : '' ?>" style="margin-left: -12px;"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn bg-maroon btn-flat remove <?php echo ($i == 0) ? 'hide' : '' ?>" style="margin-left: -12px;"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                <?php $i++;
                                    }
                                } else {
                                    ?>
                                        <div class="col-md-12 pivot-inner mbt10 inner-col-8p">
                                            <div class="col-md-2">
                                                <?php echo form_hidden('levels[0][battle_type]', 'NORMAL'); ?>
                                                <?php echo form_input([
                                                  'type'                    => 'text',
                                                  'name'                    => 'levels[0][level_name]',
                                                  'class'                   => 'form-control',
                                                  'data-fv-row'             => '.col-md-2',
                                                  'data-fv-notempty'        => 'true',
                                                  'data-fv-notempty-message'=> 'Level Name Cannot Be Empty',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <?php echo form_input([
                                                  'type'                               => 'text',
                                                  'name'                               => 'levels[0][duration]',
                                                  'class'                              => 'form-control',
                                                  'data-fv-row'                        => '.col-md-1',
                                                  'data-fv-notempty'                   => 'true',
                                                  'data-fv-notempty-message'           => 'Please Enter Game Duration (In Seconds)',
                                                  'data-fv-numeric'                    => 'true',
                                                  'data-fv-numeric-message'            => 'Duration Seconds Must Be Numeric',
                                                  'data-fv-numeric-thousandsseparator' => '',
                                                  'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                                <?php echo form_hidden('levels[0][prize_type]', 'BID'); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <?php echo form_input([
                                                  'type'                               => 'text',
                                                  'name'                               => 'levels[0][prize_value]',
                                                  'class'                              => 'form-control',
                                                  'data-fv-row'                        => '.col-md-1',
                                                  'data-fv-notempty'                   => 'true',
                                                  'data-fv-notempty-message'           => 'Prize Value Cannot Be Empty',
                                                  'data-fv-numeric'                    => 'true',
                                                  'data-fv-numeric-message'            => 'Prize Value Must Be Numeric',
                                                  'data-fv-numeric-thousandsseparator' => '',
                                                  'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <?php echo form_input([
                                                  'type'                               => 'text',
                                                  'name'                               => 'levels[0][default_bids]',
                                                  'class'                              => 'form-control',
                                                  'data-fv-row'                        => '.col-md-1',
                                                  'data-fv-notempty'                   => 'true',
                                                  'data-fv-notempty-message'           => 'Please Provide Some Default Bids To Play',
                                                  'data-fv-numeric'                    => 'true',
                                                  'data-fv-numeric-message'            => 'Available Bids Must Be Numeric',
                                                  'data-fv-numeric-thousandsseparator' => '',
                                                  'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo form_input([
                                                  'type'                               => 'text',
                                                  'name'                               => 'levels[0][last_bid_winner_percent]',
                                                  'class'                              => 'form-control',
                                                  'data-fv-row'                        => '.col-md-2',
                                                  'data-fv-notempty'                   => 'true',
                                                  'data-fv-notempty-message'           => 'Last Bid Winner Percent (In Case of Different)',
                                                  'data-fv-numeric'                    => 'true',
                                                  'data-fv-numeric-message'            => 'Percent Must Be Numeric',
                                                  'data-fv-numeric-thousandsseparator' => '',
                                                  'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo form_input([
                                                    'type'                               => 'text',
                                                    'name'                               => 'levels[0][longest_bid_winner_percent]',
                                                    'class'                              => 'form-control',
                                                    'data-fv-row'                        => '.col-md-2',
                                                    'data-fv-notempty'                   => 'true',
                                                    'data-fv-notempty-message'           => 'Longest Bid Winner Percent (In Case of Different)',
                                                    'data-fv-numeric'                    => 'true',
                                                    'data-fv-numeric-message'            => 'Percent Must Be Numeric',
                                                    'data-fv-numeric-thousandsseparator' => '',
                                                    'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <?php echo form_input([
                                                  'type'                               => 'text',
                                                  'name'                               => 'levels[0][min_players_to_start]',
                                                  'class'                              => 'form-control',
                                                  'data-fv-row'                        => '.col-md-1',
                                                  'data-fv-notempty'                   => 'true',
                                                  'data-fv-notempty-message'           => 'Provide Minimum Players To Start The Game',
                                                  'data-fv-numeric'                    => 'true',
                                                  'data-fv-numeric-message'            => 'Value Must Be Numeric',
                                                  'data-fv-numeric-thousandsseparator' => '',
                                                  'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <?php echo form_input([
                                                  'type'                               => 'text',
                                                  'name'                               => 'levels[0][min_wins_to_unlock_next]',
                                                  'class'                              => 'form-control',
                                                  'data-fv-row'                        => '.col-md-1',
                                                  'data-fv-notempty'                   => 'true',
                                                  'data-fv-notempty-message'           => 'Provide Minimum Wins Required To Unlock Next Level',
                                                  'data-fv-numeric'                    => 'true',
                                                  'data-fv-numeric-message'            => 'Value Must Be Numeric',
                                                  'data-fv-numeric-thousandsseparator' => '',
                                                  'data-fv-numeric-decimalseparator'   => '.',
                                                ]); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn bg-purple btn-flat add" style="margin-left: -12px;"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn bg-maroon btn-flat remove hide" style="margin-left: -12px;"><i class="fa fa-minus"></i></button>
                                            </div>
                                        </div>
                                <div class="clearfix"></div>
                                <?php
                                } ?>
                            </div>
                      </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>