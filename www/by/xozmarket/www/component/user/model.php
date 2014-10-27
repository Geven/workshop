<?php
namespace local\user;

class model extends \common\Model{
    function process() {
        $data = array();

        $data["NAME"] = $this->owner->name;
        $data["TEMPLATE"] = $this->owner->template;
        $data["CACHE"] = $this->owner->cache;
        $data["LIFE"] = $this->owner->life;
        $data["ID"] = $this->owner->id;
        $data["CREATION_TIME"] = microtime();
        $data["AUTHORIZED"] = false;

        /*$i = 0;
        while($i < 100000000) {
            $i ++;
        }*/

        if(isset($_SESSION["authorized"])) {
            $data["AUTHORIZED"] = ($_SESSION["authorized"] == true);

            if($data["AUTHORIZED"]) {
                if(isset($_SESSION["name"])) {
                    $data["NAME"] = $_SESSION["name"];
                }
            }
        }

        return $data;
    }
}
