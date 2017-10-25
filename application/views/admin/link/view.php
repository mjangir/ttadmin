<div class="modal-header bg-primary no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><i class="<?php echo $record->getIcon(); ?>"></i> <?php echo $record->getName(); ?> - View Details</h4>
</div>
<div class="modal-body">
    <table class="table table-striped" style="margin:none;">
        <tbody>
            <tr>
                <td style="width:20%;"><label><strong>Alias</strong></label></td>
                <td style="width:2%;"><label><strong>:</strong></label></td>
                <td style="width:78%;"><?php echo $record->getAlias(); ?></td>
            </tr>
            <tr>
                <td><label><strong>Category</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getLinkCategory()->getName(); ?></td>
            </tr>
            <tr>
                <td><label><strong>Hyper Link</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getHref(); ?></td>
            </tr>
            <tr>
                <td><label><strong>Status</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo ucwords(strtolower($record->getStatus())); ?></td>
            </tr>
            <tr>
                <td><label><strong>Created On</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td>
                    <?php 
                        if ($record->getCreatedOn() !== null) {
                            echo $record->getCreatedOn()->format('Y-m-d');
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label><strong>Updated On</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td>
                    <?php 
                        if ($record->getUpdatedOn() !== null) {
                            echo $record->getUpdatedOn()->format('Y-m-d');
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label><strong>Actions</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td colspan="4">
                        <?php if ($record->getActions() !== null) {
                        $actions = json_decode($record->getActions(), true);
                        if (is_array($actions)) {
                            echo '<ul class="list-unstyled">';
                            foreach ($actions as $key => $value) {
                                ?>
                                <li><?php echo $value; ?></li>
                        <?php
                            }
                            echo '</ul>';
                        }
                    }?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<!-- /.modal-footer -->