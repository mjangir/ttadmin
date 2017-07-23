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
                <form method="post" action="<?php echo $saveUrl;?>" id="setting-application-form">
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
</div>