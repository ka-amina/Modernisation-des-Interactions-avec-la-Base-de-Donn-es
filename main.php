<?php
require_once 'classes/players.php';

$player = new Player();


// add new player

// $addPlayer= $player->create([
// 'name'=> 'test',
// 'club_id'=> 3,
// 'nationality' => 'mac',
// 'position_name' =>'ST',
// 'rating' => 36,
// 'is_deleted' => 0

// ]);


// update player
$updatePlayer= $player->update(['name'=> 'samir'],['player_id'=>23]);



// Show all players

$players = $player->read();
foreach ($players as $p) {
    echo "ID: {$p['player_id']}, Name: {$p['name']}, Rating: {$p['rating']} <br>";
}

// delete player from database

// $deletePlayer= $player->delete(['player_id'=>8]);
// echo "Number of Rows Deleted: $deletePlayer";




?>