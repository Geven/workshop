<?php
namespace local\a;

class m extends \common\M{
    function process() {
        $data = array();

        $data["NAME"] = $this->owner->name;
        $data["TEMPLATE"] = $this->owner->template;
        $data["CACHE"] = $this->owner->cache;
        $data["LIFE"] = $this->owner->life;
        $data["ID"] = $this->owner->id;
        $data["CREATION_TIME"] = microtime();

         $i = 0;
         while($i < 100000000) {
             $i ++;
         }

        return $data;
    }
}

