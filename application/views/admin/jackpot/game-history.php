<div class="modal-header bg-primary no-border">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo $pageHeading; ?> - <?php echo $jackpotTitle; ?> <i>(How many times played)</i></h4>
</div>
<div class="modal-body">
    <?php
        $tableStyle = ($games->count() > 6) ? 'max-height:400px;overflow-y:scroll;overflow-x:hidden;' : '';
    ?>
    <div style="<?php echo $tableStyle; ?>">
        <table class="table table-th-block table-info table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 30px;">#</th>
                <th>Total Users</th>
                <th>Total Bids</th>
                <th>Longest Bid Duration</th>
                <th>Last Bid Duration</th>
                <th>Longest Bid Winner</th>
                <th>Last Bid Winner</th>
                <th>Started On</th>
                <th>Finished On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($games->count() > 0) {
        $count = 1;
        foreach ($games as $record) {
            $id = $record->getId();
            $totalUserParticipated = $record->getTotalUsersParticipated();
            $totalNumberOfBids = $record->getTotalNumberOfBids();
            $longestBidDuration = $record->getLongestBidDuration();
            $lastBidDuration = $record->getLastBidDuration();
            $startedOn = $record->getStartedOn()->format('Y-m-d H:i:s');
            $finishedOn = $record->getFinishedOn()->format('Y-m-d H:i:s');
            $longestBidWinner = $record->getLongestBidWinnerUser()->getName();
            $lastBidWinner = $record->getLastBidWinnerUser()->getName(); ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $totalUserParticipated; ?></td>
                    <td><?php echo $totalNumberOfBids; ?></td>
                    <td><?php echo convertSecondsToTimeFormat($longestBidDuration); ?></td>
                    <td><?php echo convertSecondsToTimeFormat($lastBidDuration); ?></td>
                    <td><?php echo $longestBidWinner; ?></td>
                    <td><?php echo $lastBidWinner; ?></td>
                    <td><?php echo $startedOn; ?></td>
                    <td><?php echo $finishedOn; ?></td>
                    <td>
                        <!-- <a href="<?php echo $jackpotGameBidsUrl.'?id='.$id; ?>">
                            <i class="fa fa-dollar text-info" data-toggle="tooltip" title="View All Bids"></i>
                        </a>&nbsp; -->
                        <a href="<?php echo $jackpotGameUsersUrl.'?id='.$id; ?>">
                            <i class="fa fa-group text-info" data-toggle="tooltip" title="View All Users Played"></i>
                        </a>
                    </td>
                </tr>
                   <?php ++$count;
        }
    } else {
        ?>
                <tr>
                    <td colspan="10" class="text-center"> No Game History Found For This Jackpot.</td>
                </tr>
                <?php
    } ?>
        </tbody>
    </table>
    </div>
    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>