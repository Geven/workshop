<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/User.php");

class Session {
    static function getID() {
        $data = null;

        $value = RequestCheck::mine("uid");
        if($value) {
            $data = $_REQUEST["uid"];
        }
        else {
            $data = mt_rand();
        }

        return $data;
    }
}