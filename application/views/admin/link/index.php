<div class="row">
<div class="col-md-12">
<?php
if (!$isAjaxRequest) {
    $linkCategory = (!empty($postData['linkCategory'])) ? $postData['linkCategory'] : null;
    $parentId = (!empty($postData['parentId'])) ? $postData['parentId'] : null;
    $name = (!empty($postData['name'])) ? $postData['name'] : null;
    $alias = (!empty($postData['alias'])) ? $postData['alias'] : null; ?>
<form method="post" name="link_search_form" action="<?php echo $listingUrl; ?>" class="ajax listing-search" data-replace=".paginated_tbl" id="adsearchform">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Search Link</h3>
        </div>
        <div class="box-body">
            <div class="row category-wise-link">
                <div class="col-xs-3 col-md-3 col-sm-4">
                    <label class="control-label">Link Category</label>
                    <?php echo form_dropdown('linkCategory', $linkCategoryDropdown, $linkCategory, 'class="form-control link-category"'); ?>
                </div>
                <div class="col-xs-3 col-md-3 col-sm-4">
                    <label class="control-label">Parent Link</label>
                    <?php echo form_dropdown('parentId', ['' => 'Select Link'] + $linkDropdown, $parentId, 'class="form-control link"'); ?>
                </div>
                <div class="col-xs-3 col-md-3 col-sm-4">
                    <label class="control-label">Link Name</label>
                    <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => $name]); ?>
                </div>
                <div class="col-xs-3 col-md-3 col-sm-4">
                    <label class="control-label">Link Alias</label>
                    <?php echo form_input(['name' => 'alias', 'class' => 'form-control', 'value' => $alias]); ?>
                </div>
            </div>
        </div>
        <div class="box-footer clearfix text-right">
            <button type="submit" class="btn btn-primary" data-action="search">
                <i class="fa fa-search"></i> Search
            </button>
            <button type="submit" class="btn btn-danger ajax" data-action="reset-search">
                <i class="fa fa-refresh"></i> Reset
            </button>
        </div>
    </div>
</form>

<?php
}?>
<div class="the-box no-border paginated_tbl" data-refresh-url="<?php echo $listingUrl.'?page='.$page; ?>">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Application Links</h3>
        <a class="btn btn-primary pull-right" href="<?php echo $addUrl; ?>" data-toggle="modal" data-modal-class="modal60p" data-target="#bjmodal">
            <i class="fa fa-plus"></i> Add Link
        </a>
    </div>
    <div class="box-body">
        <table class="table table-th-block table-info table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px;">No</th>
                    <th>Icon</th>
                    <th>Link Name</th>
                    <th>Alias</th>
                    <th>Category</th>
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
            $labelClass = ($record->getStatus() == 'ACTIVE') ? 'success' : 'danger';
            $linkCategory = $record->getLinkCategory()->getName(); ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><i class="<?php echo $record->getIcon(); ?>"></i></td>
                        <td><?php echo $record->getName(); ?></td>
                        <td><?php echo $record->getAlias(); ?></td>
                        <td><?php echo $linkCategory; ?></td>
                        <td><span class="label label-<?php echo $labelClass; ?>"><?php echo $qualifiedStatus; ?></span></td>
                        <td>
                            <a href="<?php echo $viewUrl.'?id='.$id; ?>" data-toggle="modal" data-modal-class="modal60p" data-target="#bjmodal"><i class="fa fa-eye text-info" data-toggle="tooltip" title="View"></i></a>&nbsp;
                            <a href="<?php echo $updateUrl.'?id='.$id; ?>" data-toggle="modal" data-modal-class="modal60p" data-target="#bjmodal">
                                <i class="fa fa-edit text-info" data-toggle="tooltip" title="Update"></i></a>&nbsp;
                            <a href="<?php echo $deleteUrl.'?id='.$id; ?>" class="ajax confirm" data-confirm-message="Are you sure, you want to delete this link?" data-method="post" data-refresh=".paginated_tbl">
                                <i class="fa fa-trash-o text-danger" data-toggle="tooltip" title="Delete"></i></a>&nbsp;
                            <a href="<?php echo $statusUrl.'?id='.$id; ?>" class="ajax confirm" data-confirm-message="Are you sure, you want to make this link <?php echo $statusTitle; ?>?" data-method="post" data-refresh=".paginated_tbl">
                                <i class="fa fa-ban text-warning" data-toggle="tooltip" title="Make <?php echo $statusTitle; ?>"></i>
                        </td>
                    </tr>
                       <?php $count++;
        }
    } else {
        ?>
                            <tr>
                                <td colspan="7" class="text-center"> No Data Found.</td>
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