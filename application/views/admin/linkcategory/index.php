<div class="row">
<div class="col-md-12">
<div class="the-box no-border paginated_tbl" data-refresh-url="<?php echo $listingUrl.'?page='.$page; ?>">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Link Categories</h3>
    </div>
    <div class="box-body">
        <table class="table table-th-block table-info table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px;">No</th>
                    <th>Category Name</th>
                    <th>Alias</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data->count() > 0) {
    $count = $listStartFrom;
    foreach ($data as $record) {
        $id = $record->getId(); ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record->getName(); ?></td>
                        <td><?php echo $record->getAlias(); ?></td>
                    </tr>
                       <?php $count++;
    }
} else {
    ?>
                            <tr>
                                <td colspan="3" class="text-center"> No Data Found.</td>
                            </tr>
                       <?php
} ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>