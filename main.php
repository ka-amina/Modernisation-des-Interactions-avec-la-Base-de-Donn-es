<?php
require_once 'classes/players.php';

$player = new Player();

$players = $player->read();
foreach ($players as $p) {
    echo "ID: {$p['player_id']}, Name: {$p['name']}, Rating: {$p['rating']}";
}


$deletePlayer= $player->delete(['player_id'=>8]);
echo "Number of Rows Deleted: $deletePlayer";


?>