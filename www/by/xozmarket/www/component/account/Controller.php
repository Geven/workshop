<?php
namespace local\account;

class Controller {
    public $user;
    public $json;

    function __construct() {
        $this->user = new \User();
        $this->json = new \stdClass();
    }

    function process() {
        switch($value = \RequestCheck::mine("action")) {
            case "logout":
                $this->logout();
                break;
        }

        $this->output();
    }

    function output() {
        print(json_encode($this->json));
    }

    function logout() {
        session_destroy();

        header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}");

        $this->json->status = true;
        $this->json->info = "Logout success";
    }
}


