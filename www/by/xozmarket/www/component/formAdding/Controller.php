<?php
namespace local\formAdding;

class Controller {

    public $json;

    function __construct() {
        $this->json = new \stdClass();
    }


    function process() {
        switch($value = \RequestCheck::mine("action")) {

            case "formAdd":
                $this->formAdd();
                break;
        }

        $this->output();
    }

    function output() {
        print(json_encode($this->json));
    }


    function formAdd() {
        header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}/formAdd.php");
    }



}


