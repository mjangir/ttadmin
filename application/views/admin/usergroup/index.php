<div class="row">
<div class="col-md-12">
<div class="the-box no-border paginated_tbl" data-refresh-url="<?php echo $listingUrl.'?page='.$page; ?>">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">User Groups</h3>
        <a class="btn btn-primary pull-right" href="<?php echo $addUrl; ?>" data-toggle="modal" data-modal-class="modal40p" data-target="#bjmodal">
            <i class="fa fa-plus"></i> Add User Group
        </a>
    </div>
    <div class="box-body">
        <table class="table table-th-block table-info table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px;">No</th>
                    <th>Group Name</th>
                    <th>User Role</th>
                    <th>Alias</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data->count() > 0) {
    $count = $listStartFrom;
    foreach ($data as $record) {
        $id = $record->getId();
        $statusTitle = ($record->getStatus() == 'ACTIVE') ? 'Inactive' : 'Active';
        $qualifiedStatus = ucwords(strtolower($record->getStatus()));
        $labelClass = ($record->getStatus() == 'ACTIVE') ? 'success' : 'danger'; ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record->getGroupName(); ?></td>
                        <td><?php echo $record->getRole()->getRole(); ?></td>
                        <td><?php echo $record->getAlias(); ?></td>
                        <td><span class="label label-<?php echo $labelClass; ?>"><?php echo $qualifiedStatus; ?></span></td>
                        <td>
                            <a href="<?php echo $viewUrl.'?id='.$id; ?>" data-toggle="modal" data-modal-class="modal60p" data-target="#bjmodal"><i class="fa fa-eye text-info" data-toggle="tooltip" title="View"></i></a>&nbsp;
                            <a href="<?php echo $permissionUrl.'?id='.$id; ?>"><i class="fa fa-lock text-success" data-toggle="tooltip" title="Update Permissions"></i></a>&nbsp;
                            <?php if ($id !== 1 && $id !== 2) {
            ?>
                                <a href="<?php echo $updateUrl.'?id='.$id; ?>" data-toggle="modal" data-modal-class="modal40p" data-target="#bjmodal">
                                    <i class="fa fa-edit text-info" data-toggle="tooltip" title="Update"></i></a>&nbsp;
                                <a href="<?php echo $deleteUrl.'?id='.$id; ?>" class="ajax confirm" data-confirm-message="Are you sure, you want to delete this group?" data-method="post" data-refresh=".paginated_tbl">
                                    <i class="fa fa-trash-o text-danger" data-toggle="tooltip" title="Delete"></i></a>&nbsp;
                            <?php
        } ?>
                        </td>
                    </tr>
                       <?php $count++;
    }
} else {
    ?>
                            <tr>
                                <td colspan="6" class="text-center"> No Data Found.</td>
                            </tr>
                       <?php
} ?>
            </tbody>
        </table>
    </div>
    <div class="box-footer clearfix">
        <?php if ($data->count() > 0 && !empty($pagination)) {
        ?>
            <ul class="pagination pagination-sm no-margin pull-right info block-color">
            <?php echo $pagination; ?>
            </ul>
        <?php
    }?>
    </div>
    
</div>
</div>
</div>
</div>