<?php
namespace common;

class View {
    public $owner;
    public $path;

    function __construct($owner) {
        $this->owner = $owner;
        $this->populate();
    }

    function populate() {
        if($this->owner->cache) {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/cache/_v_{$this->owner->name}_{$this->owner->id}.php";
            $file  = file_exists($path);

            if($file) {
                $alive  = ((filemtime($path) + $this->owner->life) > time());

                if($alive) {
                    //$this->path = $this->process();
                    //ob_start();

                    $this->owner->output($path);
                }
                else {
                    $this->path = $this->process();

                    ob_start();

                    $this->owner->output($this->path);

                    $fp = fopen($path, "w+");
                    fwrite($fp, ob_get_clean());
                    fclose($fp);

                    $this->owner->output($path);
                }
            }
            else {
                $this->path = $this->process();

                ob_start();

                $this->owner->output($this->path);

                $fp = fopen($path, "w+");
                fwrite($fp, ob_get_clean());
                fclose($fp);

                $this->owner->output($path);
            }
        }
        else {
            $this->path = $this->process();

            //ob_start();

            $this->owner->output($this->path);
        }
    }

    function process() {
        if($this->owner->ns == "local") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/{$this->owner->name}/template/{$this->owner->template}/{$this->owner->template}.php";
            $file = file_exists($path);

            if($file) {
                return $path;
            }
            else {
                exit("ERROR: can't find template {$this->owner->template}.php for component {$this->owner->name}.");
            }
        }
        else
        if($this->owner->ns == "common") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "/common/component/{$this->owner->name}/template/{$this->owner->template}/{$this->owner->template}.php";
            $file = file_exists($path);

            if($file) {
                return $path;
            }
            else {
                exit("ERROR: can't find template {$this->owner->template}.php for component {$this->owner->name}.");
            }
        }
    }
}
