function InitializeNormalBidBattle(socket)
{
  // When user clicked on battle tab
    socket.on('response_battle', function(data)
    {
      if(data.currentGameInfo !== false)
      {
        jQuery('#normal_battle_level_unique_id').val(data.currentGameInfo.levelInfo.uniqueId);
        jQuery('#normal_battle_game_unique_id').val(data.currentGameInfo.gameInfo.uniqueId);
      }
      if(data.battleLevelsList.length > 0)
      {
        renderBidBattleLevelList(data.battleLevelsList);
      }
    });

    // When user clicked on play button of any level
    socket.on('response_join_normal_battle_level', function(data)
    {
      renderResponseJoinNormalBattleLevel(data);
    });

    socket.on('response_place_normal_battle_level_bid', function(data)
    {
      handleAfterPlaceBid(data);
    });

    socket.on('normal_battle_level_game_started', function()
    {
      handleGameStarted();
    });

    socket.on('update_normal_battle_level_player_list', function(data)
    {
      renderNormalBattleLevelPlayerList(data);
    });



    socket.on('update_normal_battle_level_timer', function(data)
    {
      updateNormalBattleTimer(data);
    });

    socket.on('hide_normal_battle_level_place_bid_button', function()
    {
      console.log("hide button");
      jQuery('#place-normal-battle-bid').addClass('hide');
    });

    socket.on('show_normal_battle_level_place_bid_button', function()
    {
      console.log("show button");
      jQuery('#place-normal-battle-bid').removeClass('hide');
    });

    socket.on('no_enough_available_bids', function()
    {
      alert("you dont have enough bids available");
    })
}