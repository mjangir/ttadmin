<?php
if (!$isAjaxRequest) {
    $id = $game->getId();
    $title = $game->getJackpot()->getTitle();
    $totalUserParticipated = $game->getTotalUsersParticipated();
    $totalNumberOfBids = $game->getTotalNumberOfBids();
    $longestBidDuration = $game->getLongestBidDuration();
    $lastBidDuration = $game->getLastBidDuration();
    $startedOn = $game->getStartedOn()->format('Y-m-d H:i:s');
    $finishedOn = $game->getFinishedOn()->format('Y-m-d H:i:s');
    $longestBidWinner = $game->getLongestBidWinnerUser()->getName();
    $lastBidWinner = $game->getLastBidWinnerUser()->getName();
}
?>
<div class="row">
<div class="col-md-12">
<?php if (!$isAjaxRequest) {
    ?>
    <div class="the-box no-border">
        <div class="box box-success">
            <div class="box-header">
                <h4><?php echo $title; ?> - <i>(Details and list of users who played this game)</i></h4>
            </div>
            <div class="box-body">
                <table class="table table-th-block table-info">
                    <thead>
                        <tr>
                            <th>Total Users</th>
                            <th>Total Bids</th>
                            <th>Longest Bid Duration</th>
                            <th>Last Bid Duration</th>
                            <th>Longest Bid Winner</th>
                            <th>Last Bid Winner</th>
                            <th>Started On</th>
                            <th>Finished On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $totalUserParticipated; ?></td>
                            <td><?php echo $totalNumberOfBids; ?></td>
                            <td><?php echo convertSecondsToTimeFormat($longestBidDuration); ?></td>
                            <td><?php echo convertSecondsToTimeFormat($lastBidDuration); ?></td>
                            <td><?php echo $longestBidWinner; ?></td>
                            <td><?php echo $lastBidWinner; ?></td>
                            <td><?php echo $startedOn; ?></td>
                            <td><?php echo $finishedOn; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
} ?>
<div class="the-box no-border paginated_tbl">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Users List</h3>
    </div>
    <div class="box-body">
        <table class="table table-th-block table-info table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th>Name</th>
                    <th>Joined On</th>
                    <th>Quitted On</th>
                    <th>Total Bids Placed</th>
                    <th>Remaining Bids Available</th>
                    <th>Longest Bid Duration <br/>(Excluding Last)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data->count() > 0) {
        $count = $listStartFrom;
        foreach ($data as $record) {
            $id = $record->getId();
            $name = $record->getUser()->getName();
            $joinedOn = !empty($record->getJoinedOn()) ? $record->getJoinedOn()->format('Y-m-d H:i:s') : '<span class="label label-danger">Joined But Not Played</span>';
            $quittedOn = !empty($record->getQuittedOn()) ? $record->getQuittedOn()->format('Y-m-d H:i:s') : 'Not Quitted';
            $totalBidsPlaced = $record->getTotalNumberOfBids();
            $remainingBids = $record->getRemainingAvailableBids();
            $longedBidDuration = $record->getLongestBidDuration(); ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $joinedOn; ?></td>
                        <td><?php echo $quittedOn; ?></td>
                        <td><?php echo $totalBidsPlaced; ?></td>
                        <td><?php echo $remainingBids; ?></td>
                        <td><?php echo $longedBidDuration; ?></td>
                        <td>
                            <a href="#">
                                <i class="fa fa-dollar text-info" data-toggle="tooltip" title="View Bids By This User"></i>
                            </a>
                        </td>
                    </tr>
                       <?php $count++;
        }
    } else {
        ?>
                    <tr>
                        <td colspan="8" class="text-center"> No Data Found.</td>
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
    } ?>
    </div>
</div>
</div>
</div>
</div>