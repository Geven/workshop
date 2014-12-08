<?php
namespace local\imageAdding;

class Controller {

    public $json;

    function __construct() {
        $this->json = new \stdClass();
    }


    function process() {
        switch($value = \RequestCheck::mine("action")) {

            case "imageAdd":
                $this->imageAdd();
                break;
        }

        $this->output();
    }

    function output() {
        print(json_encode($this->json));
    }


    function imageAdd() {
        header("Location: http://{$GLOBALS["host"]->name}.{$GLOBALS["host"]->host}.{$GLOBALS["host"]->zone}/imageAdd.php");
    }



}


