<?php

use App\DB\Migration;

class SelectFromKinds extends Migration {
    protected function up(){
        $this->select(["id", "kinds"]);

        return self::SUCCESS;
    }

    protected function down(){
        return self::SUCCESS;
    }
}