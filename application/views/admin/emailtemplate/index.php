<div class="row">
<div class="col-md-12">
<div class="the-box no-border paginated_tbl" data-refresh-url="<?php echo $listingUrl.'?page='.$page; ?>">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Email Templates</h3>
        <a class="btn btn-primary pull-right" href="<?php echo $addUrl; ?>">
            <i class="fa fa-plus"></i> Add Template
        </a>
    </div>
    <div class="box-body">
        <table class="table table-th-block table-info table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th>Template Name</th>
                    <th>Subject</th>
                    <th>Alias</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data->count() > 0) {
    $count = $listStartFrom;
    foreach ($data as $record) {
        $id = $record->getId(); ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record->getTemplateName(); ?></td>
                        <td><?php echo $record->getSubject(); ?></td>
                        <td><?php echo $record->getAlias(); ?></td>
                        <td>
                            <a href="<?php echo $updateUrl.'?id='.$id; ?>">
                                <i class="fa fa-edit text-info" data-toggle="tooltip" title="Update"></i>
                            </a>
                        </td>
                    </tr>
                       <?php ++$count;
    }
} else {
    ?>
                            <tr>
                                <td colspan="5" class="text-center"> No Data Found.</td>
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