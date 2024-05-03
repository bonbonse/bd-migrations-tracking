<?php
require 'MigrationManager.php';

class Migration extends MigrationManager
{
    public function up(){
        $this->select(["id", "kinds"]);
    }

    public function down(){

    }
}

$m = new Migration();
$m->up();
