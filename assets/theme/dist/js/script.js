var socket;

jQuery(document).ready(function()
{
  socket = io.connect(WS_BASE_PATH, {
    path: '/ticktock/socket.io',
    query: {
      userId: USERID
    }
  });

  // On socket connect
  socket.on('connect', function()
  {
    socket.on('disconnect', function(data)
    {
      console.log("disconnected");
    });

    // When user joined a game
    socket.on('me_joined', function(data)
    {
      console.log(data);
      jQuery('#jackpot_id').val(data.jackpotInfo.uniqueId);
      jQuery('#jackpot-name').html(data.jackpotInfo.name);
      jQuery('#jackpot-amount').html(data.jackpotInfo.amount);
      jQuery('#my-name').html(data.userInfo.name);
      jQuery('#my-available-bids').html(data.userInfo.availableBids);
      jQuery('#total-bids-by-me').html(data.userInfo.totalPlacedBids);
      jQuery("#quit-game-button").hide();
    });

    socket.on('no_jackpot_to_play', function(data)
    {
      console.log("No jackpot")
    });

    // When jackpot game bid placed successfully
    socket.on('my_bid_placed', function(data)
    {
        jQuery('#my-available-bids').html(data.availableBids);
        jQuery('#total-bids-by-me').html(data.totalPlacedBids);
    });

    socket.on('update_available_bid_after_battle_win', function(data)
    {
      jQuery('#my-available-bids').html(data.availableBids);
    });

    // Constant time updater
    socket.on('update_jackpot_timer', function(data)
    {
      jQuery('#game-clock').html(data.gameClockTime);
      jQuery('#doomsday-clock').html(data.doomsDayClockTime);
      jQuery('#current-bid-user').html(data.lastBidUserName);
      jQuery('#current-bid-duration').html(data.lastBidDuration);
       jQuery('#longest-bid-duration').html(data.longestBidDuration);
       jQuery('#longest-bid-username').html(data.longestBidUserName);
    });

    socket.on('jackpot_my_info_changed', function(data){
      jQuery('#my-available-bids').html(data.availableBids);
    });

    // Updated jackpot data on any event occures
    socket.on('updated_jackpot_data', function(data)
    {
      if(data.activePlayers)
      {
        //console.log(data);
        jQuery('#active-players').html(data.activePlayers);
        jQuery('#remaining-players').html(data.remainingPlayers);
        jQuery('#average-bid-bank').html(data.averageBidBank);
        jQuery('#total-users').html(data.totalUsers);
        jQuery('#total-bids').html(data.totalBids);
        jQuery('#current-bid-user').html(data.currentBidUser.name);

        if(data.canIBid == true)
        {
          jQuery('#place-bid').show();
        }
      }
    });

    // If I can bid or not
    socket.on('can_i_bid', function(data)
    {
      if(data.canIBid == true)
      {
        jQuery('#place-bid').show();
      }
      else
      {
        jQuery('#place-bid').hide();
      }
    });

    // Game finished
    socket.on('game_finished', function(data){
        console.log(data);
    });

    // Show quit button
    socket.on('show_quit_button', function(data)
    {
        jQuery("#quit-game-button").show();
    });

    socket.on('update_jackpot_amount', function(data)
    {
      jQuery('#jackpot-amount').html(data.amount);
    });

    // Game finished
    socket.on('update_home_jackpot_battle_info', function(data){
        jQuery('#current-battle-streak').html(data.battleStreak);
        jQuery('#total-battle-wins').html(data.battleWins);
    });

    // When user clicked on battle tab
    socket.on('response_battle', function(data)
    {
      console.log(data);
      if(data.currentGameInfo !== false)
      {
        jQuery('#advance_battle_level_unique_id').val(data.currentGameInfo.levelInfo.uniqueId);
        jQuery('#advance_battle_game_unique_id').val(data.currentGameInfo.gameInfo.uniqueId);
      }
      if(data.battleLevelsList.length > 0)
      {
        renderBidBattleLevelList(data.battleLevelsList);
      }
    });

    // When user clicked on play button of any level
    socket.on('response_join_advance_battle_level', function(data)
    {
      renderResponseJoinAdvanceBattleLevel(data);
    });

    socket.on('response_place_advance_battle_level_bid', function(data)
    {
      handleAfterPlaceBid(data);
    });

    socket.on('advance_battle_level_game_started', function()
    {
      handleGameStarted();
    });

    socket.on('update_advance_battle_level_player_list', function(data)
    {
      renderAdvanceBattleLevelPlayerList(data);
    });



    socket.on('update_advance_battle_level_timer', function(data)
    {
      updateAdvanceBattleTimer(data);
    });

    socket.on('hide_advance_battle_level_place_bid_button', function()
    {
      console.log("hide button");
      jQuery('#place-advance-battle-bid').addClass('hide');
    });

    socket.on('show_advance_battle_level_place_bid_button', function()
    {
      console.log("show button");
      jQuery('#place-advance-battle-bid').removeClass('hide');
    });

    socket.on('no_enough_available_bids', function()
    {
      alert("you dont have enough bids available");
    });

    socket.on('update_advance_battle_jackpot_amount', function(data)
    {
      console.log("new amount of jackpot", data.amount);
    });

    socket.on('advance_battle_level_game_finished', function(data)
    {
      console.log(data);
    });

    socket.on('advance_battle_main_jackpot_finished', function()
    {
      alert("Main game has been finished");
    });

    socket.on('advance_battle_game_about_to_start', function (data)
    {
      console.log(data.time);
    });

  });

});

// Place a bid
jQuery(document).on('click', '#place-bid', function(e)
{
    socket.emit('place_bid', {
        userId: USERID,
        jackpotUniqueId: jQuery('#jackpot_id').val()
    })
});

// Handle quiet game
jQuery(document).on('click', '#quit-game-button', function(e)
{
    socket.emit('quit_jackpot_game', {
        userId: USERID
    })
});

// When tab change
jQuery(document).on('shown.bs.tab', '#ticktock-tabs', function(e)
{
  var target = e.target.getAttribute('href');

  if(target == '#bid-battle-tab')
  {
    socket.emit('request_battle', {
        userId: USERID,
        jackpotUniqueId: jQuery('#jackpot_id').val()
    })
  }
});

jQuery(document).on('click', '.play-battle-level', function(e)
{
  var levelUniqueId = jQuery(this).closest('li').attr('data-unique-id');
  socket.emit('request_join_advance_battle_level', {
      userId            : USERID,
      jackpotUniqueId   : jQuery('#jackpot_id').val(),
      levelUniqueId     : levelUniqueId,
      battleType        : 'GAMBLING'
  })
});

// Place a advance battle bid
jQuery(document).on('click', '#place-advance-battle-bid', function(e)
{
    socket.emit('request_place_advance_battle_level_bid', {
        userId: USERID,
        jackpotUniqueId: jQuery('#jackpot_id').val(),
        levelUniqueId : jQuery('#advance_battle_level_unique_id').val(),
        gameUniqueId: jQuery('#advance_battle_game_unique_id').val()
    })
});

function renderBidBattleLevelList(data)
{
  console.log(data);

  jQuery('#battle-level-list-container').removeClass('hide');
  jQuery('#battle-level-game-container').addClass('hide');

  var html = '';
  for(var k in data)
  {
    var level = data[k];
    var icon  = level.isLocked ? '<strong> : Locked</strong>' : '';
    html += '<li class="list-group-item level-item" data-unique-id="'+level.uniqueId+'">'+level.levelName+' &nbsp;<button class="btn btn-xs btn-success play-battle-level">Play Level '+icon+'</button></li>';
  }
  jQuery('#battle-level-list').html(html);
}

function renderAdvanceBattleLevelPlayerList(data)
{
  jQuery('#battle-level-list-container').addClass('hide');
  jQuery('#battle-level-game-container').removeClass('hide');
console.log(data.players);

  var html = ``;

  if(data.players.length > 0)
  {
    for(var k in data.players)
    {
      var user = data.players[k];
      if(user.id != USERID)
      {
        html  += `<div class="col-md-6 mbt10">
            <div class="media">
                  <a href="#" class="pull-left">
                    <img alt="64x64" class="media-object img-thumbnail" style="width: 64px; height: 64px;" src="${user.picture}">
                  </a>
                  <div class="media-body text-left">
                    <h4 class="media-heading"><strong><a href="#">${user.name}</a></strong></h4>
                    <p class="small">${user.totalBids} Bids</p>
                  </div>
                </div>
          </div>`;

      }
    }
  }
  jQuery('#battle-level-playing-users').html(html);
}

function updateAdvanceBattleTimer(data)
{
  //console.log(data);
  jQuery('#battle-clock-time').html(data.battleClock);
  jQuery('#nbl-current-bid-length').html(data.currentBidDuration);
  jQuery('#nbl-current-bid-user').html(data.currentBidUserName);
  jQuery('#nbl-longest-bid-length').html(data.longestBidDuration);
  jQuery('#nbl-longest-bid-user').html(data.longestBidUserName);

}

function renderResponseJoinAdvanceBattleLevel(data)
{
  //console.log(data);

  var usersHtml = ``,
      myUserId  = data.myInfo.userId;

  if(data.players.length > 0)
  {
    for(var k in data.players)
    {
      var players = data.players[k];

      if(players.userId != myUserId)
      {
        usersHtml  += `<div class="col-md-6 mbt10">
            <div class="media">
                  <a href="#" class="pull-left">
                    <img alt="64x64" class="media-object img-thumbnail" style="width: 64px; height: 64px;" src="${players.picture}">
                  </a>
                  <div class="media-body text-left">
                    <h4 class="media-heading"><strong><a href="#">${players.name}</a></strong></h4>
                    <p class="small">${players.totalBids} Bids</p>
                  </div>
                </div>
          </div>`;

      }
    }
  }
  jQuery('#battle-level-playing-users').html(usersHtml);

  jQuery('#my-advance-battle-available-bids').html(data.myInfo.availableBids);
  jQuery('#my-advance-battle-placed-bids').html(data.myInfo.totalPlacedBids);

  jQuery('#battle-clock-time').html(data.levelInfo.duration);
  jQuery('#battle-level-name').html(data.levelInfo.levelName);
  jQuery('#battle-level-prize').html(data.levelInfo.prizeValue + ' ' + data.levelInfo.prizeType);

  if(data.currentBidUser != null)
  {
    jQuery('#current-bid-user').html(data.currentBidUser + ' - ' + data.currentBidDuration);
  }

  if(data.longestBidUser != null)
  {
    jQuery('#longest-bid-user').html(data.longestBidUser + ' - ' + data.longestBidUser);
  }

  jQuery('#advance_battle_level_unique_id').val(data.levelInfo.uniqueId);
  jQuery('#advance_battle_game_unique_id').val(data.gameInfo.uniqueId);

  jQuery('#battle-level-list-container').addClass('hide');
  jQuery('#battle-level-game-container').removeClass('hide');
}


function handleAfterPlaceBid(data)
{
  jQuery('#my-advance-battle-available-bids').html(data.availableBids);
  jQuery('#my-advance-battle-placed-bids').html(data.totalPlacedBids);
}

function handleGameStarted()
{
  jQuery('#place-advance-battle-bid').removeClass('hide');
}