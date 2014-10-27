<?php
namespace local\_aTest;

class View extends \common\View {
    function process() {
        if($this->parent->ns == "local") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/{$this->parent->name}/template/{$this->parent->template}/{$this->parent->template}.php";
            $file = file_exists($path);

            if($file) {
                return $path;
            }
            else {
                exit("ERROR: can't find template {$this->parent->template}.php for component {$this->parent->name}.");
            }
        }
        else
        if($this->parent->ns == "common") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "/common/component/{$this->parent->name}/template/{$this->parent->template}/{$this->parent->template}.php";
            $file = file_exists($path);

            if($file) {
                return $path;
            }
            else {
                exit("ERROR: can't find template {$this->parent->template}.php for component {$this->parent->name}.");
            }
        }
    }
}






