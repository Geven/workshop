<?php
class User {
    public $type;
    public $info;

    function __construct() {
        $this->type = $this->type();
        $this->info = $this->info();
    }

    function type() {
        $data = null;

        $value = SessionCheck::mine("type");
        if($value) {
            $data = $value;
        }
        else {
            $data = "guest";
        }

        return $data;
    }

    function info() {
        $data = null;

        $value = SessionCheck::mine("info");
        if($value) {
            $data = $value;
        }
        else {
            $data = array();
        }

        return $data;
    }
}