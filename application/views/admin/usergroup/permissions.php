<form method="post" name="updateMenuPermissionForm" action="<?php echo $saveUrl; ?>" class="ajax" id="updateMenuPermissionForm">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-lock"></i> Update Permissions - <?php echo $groupName; ?></h3>
    </div>
    <div class="box-body">
        <input type="hidden" name="userGroupId" value="<?php echo $userGroupId; ?>">
        <div class="panel-group" id="accordion">
            <?php
            $i = 1;
            foreach ($links as $link) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="block-collapse" data-parent="#accordion" data-toggle="collapse" href="#child-link-<?php echo $i; ?>"><?php echo $link['name']; ?> <div class="pull-right"><?php echo $link['categoryName']; ?></div>
                            </a>
                        </h3>
                    </div>
                    <div id="child-link-<?php echo $i; ?>" class="collapse parent-link">
                        <div class="panel-body">
                            <?php
                            if (!empty($link['sub'])) {
                                $totalSubMenus = 0;
                                $leastPermission = 0;
                                foreach ($link['sub'] as $tempSubMenu) {
                                    $permittedTempSmActions = json_decode($tempSubMenu['permissions']);
                                    if (count($permittedTempSmActions) > 0) {
                                        ++$leastPermission;
                                    }
                                    ++$totalSubMenus;
                                }
                                $permitAllChecked = ($totalSubMenus == $leastPermission) ? 'checked="checked"' : ''; ?>
                                <div class="col-md-6 col-sm-6">
                                    <label><input type="checkbox" name="menu[<?php echo $link['id'] ?>][permissions][]" value="ALL" class="parent-link-check-all" <?php echo $permitAllChecked; ?>> Permit <?php echo $link['name']; ?></label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="child-links">
                                    <?php
                                    $smCnt = 1;
                                foreach ($link['sub'] as $subMenu) {
                                    $permittedSmActions = (!empty($subMenu['permissions'])) ? json_decode($subMenu['permissions']) : [];
                                    $smAllActionChecked = (in_array('ALL', $permittedSmActions)) ? 'checked="checked"' : ''; ?>
                                        <div class="col-md-6 col-sm-6 child-link">
                                            <div class="the-box bg-dark no-border child-menu-permission"><?php echo $subMenu['name']; ?></div>
                                            <div class="col-md-6 col-sm-6 menu-action">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="menu[<?php echo $subMenu['id'] ?>][permissions][]" value="ALL" class="child-link-check-all" <?php echo $smAllActionChecked; ?>>All Rights</label>
                                                </div>
                                            </div>
                                            <?php
                                            if (!empty($subMenu['actions'])) {
                                                echo '<div>';
                                                $subMenuActions = json_decode($subMenu['actions'], true);
                                                $actionCnt = 1;
                                                foreach ($subMenuActions as $smActionKey => $smActionValue) {
                                                    $smActionChecked = (in_array($smActionKey, $permittedSmActions)) ? 'checked="checked"' : ''; ?>
                                                    <div class="col-md-6 col-sm-6 menu-action">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="menu[<?php echo $subMenu['id'] ?>][permissions][]" value="<?php echo $smActionKey; ?>" class="child-link-check-action" <?php echo $smActionChecked; ?>> <?php echo $smActionValue; ?></label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($actionCnt % 2 == 0) {
                                                        echo '<div class="clear"></div>';
                                                    }
                                                    ++$actionCnt;
                                                }
                                                echo '</div>';
                                            } ?>
                                        </div>
                                        <?php
                                        if ($smCnt % 2 == 0) {
                                            echo '<div class="clear"></div>';
                                        }

                                    ++$smCnt;
                                }
                                echo '</div>';
                            } else {
                                if (!empty($link['actions'])) {
                                    $permittedLinkActions = (!empty($link['permissions'])) ? json_decode($link['permissions']) : [];
                                    $linkActions = json_decode($link['actions'], true);
                                    $linkAllActionChecked = (in_array('ALL', $permittedLinkActions)) ? 'checked="checked"' : '';

                                    echo '<div class="child-link">';

                                    $linkActionCnt = 1;
                                    foreach ($linkActions as $linkActionKey => $linkActionValue) {
                                        $linkActionChecked = (in_array($linkActionKey, $permittedLinkActions)) ? 'checked="checked"' : ''; ?>
                                            <div class="col-md-3 col-sm-3 menu-action">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="menu[<?php echo $link['id'] ?>][permissions][]" value="<?php echo $linkActionKey; ?>" class="child-link-check-action" <?php echo $linkActionChecked; ?>> <?php echo $linkActionValue; ?></label>
                                                </div>
                                            </div>
                                <?php
                                ++$linkActionCnt;
                                    }
                                    echo '</div>';
                                } else {
                                    echo '<div class="child-link">';
                                    echo '<div class="col-md-3 col-sm-3 menu-action">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="menu['.$link['id'].'][permissions][]" value="ALL" class="child-link-check-all">All Rights</label>
                                    </div>
                                </div>';
                                    echo '</div>';
                                }
                            } ?>
                            </div><!-- /.panel-body -->
                        </div><!-- /.collapse in -->
                    </div><!-- /.panel panel-default -->
        <?php
        ++$i;
            }
    ?>
            </div><!-- /.panel-group -->
        </div>
    </div>
    <div class="box-footer clearfix">
        <button type="submit" class="btn btn-success btn-square">
            <i class="fa fa-save"></i> Save
        </button>
        &nbsp;
        <a href="<?php echo $cancelUrl; ?>" class="btn btn-danger btn-square">
            <i class="fa fa-close"></i> Cancel
        </a>
    </div>
</div>
</form>