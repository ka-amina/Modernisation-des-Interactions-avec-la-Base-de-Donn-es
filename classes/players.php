<?php

require_once 'orm.php';

class Player extends ORM {
    protected $table = 'PLAYERS';

    public function __construct() {
        parent::__construct();
    }
}
?>