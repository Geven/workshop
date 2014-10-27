<?php
namespace local\_bTest;

class Model extends \common\Model{
    function process() {
        $data = array();

        $data["NAME"] = $this->parent->name;
        $data["TEMPLATE"] = $this->parent->template;
        $data["CACHE"] = $this->parent->cache;
        $data["LIFE"] = $this->parent->life;
        $data["ID"] = $this->parent->id;
        $data["CREATION_TIME"] = microtime();

        /*$i = 0;
        while($i < 100000000) {
            $i ++;
        }*/

        return $data;
    }
}

