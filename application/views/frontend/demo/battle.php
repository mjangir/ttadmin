<div class="bgwhite pad10 col-md-12">
    <div class="row pad10 text-bold hide" id="battle-level-list-container">
        <ul id="battle-level-list" class="list-group text-left">
            
        </ul>
    </div>
    <div class="row pad10 text-bold" id="battle-level-game-container">
    	<div class="col-md-4" style="border-right: 1px solid #ccc; height: 300px;">
    		<div class="row">
                <div class="col-md-12 text-center text-bold" id="battle-clock-time"></div>
                <div class="col-md-9 text-left" id="battle-level-name"></div>
                <div class="col-md-3 text-right" id="battle-level-prize"></div>
            </div>
    	</div>
    	<div class="col-md-5" style="border-right: 1px solid #ccc;height: 300px;">
    		<div class="row">
    			<div class="col-md-6 text-left mbt10">
				    <span class="text-bold">Current Bid: </span>
				    <span id="current-bid-user"></span>
				    <span id="current-bid-length"></span>
				</div>
				 <div class="col-md-6 text-right text-bold mbt10">
				    <span class="text-bold">Longest Bid: </span>
				    <span id="longest-bid-user"></span>
				    <span id="longest-bid-length"></span>
				</div>
    		</div>
    		<div class="row" id="battle-level-playing-users">

    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="row">
    			<div class="col-md-12 text-left mbt10">
    				My Available Bids - <span id="my-normal-battle-available-bids"></span>
    			</div>
    			<div class="col-md-12 text-left mbt10">
    				My Remaining Bids - <span id="my-normal-battle-placed-bids"></span>
    			</div>
    			<div class="col-md-12">
    				<button class="btn btn-sm btn-success">Place A Bid</button>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<input type="hidden" name="" id="jackpot_id">