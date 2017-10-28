<div class="row">
    <div class="col-lg-12 text-center">

    <div id="exTab3"> 
        <ul class="nav nav-pills" id="ticktock-tabs">
            <li class="active">
                <a href="#jackpot-tab" data-toggle="tab">Jackpot</a>
            </li>
            <li>
                <a href="#bid-battle-tab" data-toggle="tab">Bid Battle</a>
            </li>
        </ul>

    <div class="tab-content clearfix">
      <div class="tab-pane active" id="jackpot-tab">
        <?php include_once 'jackpot.php'; ?>
      </div>
      <div class="tab-pane" id="bid-battle-tab">
        <?php include_once 'battle.php'; ?>
      </div>
    </div>
</div>
<!-- /.row -->

<script type="text/javascript">
    var USERID = <?php echo $userId; ?>
</script>