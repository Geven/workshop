<?php
namespace common;

class View {
    public $parent;
    public $path;

    function __construct($parent) {
        $this->parent = $parent;
        $this->mine();
    }

    function mine() {
        if($this->parent->cache) {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/cache/_v_{$this->parent->name}_{$this->parent->id}.php";
            $file  = file_exists($path);

            if($file) {
                $alive  = ((filemtime($path) + $this->parent->life) > time());

                if($alive) {
                    //$this->path = $this->process();
                    //ob_start();

                    $this->parent->output($path);
                }
                else {
                    $this->path = $this->process();

                    ob_start();

                    $this->parent->output($this->path);

                    $fp = fopen($path, "w+");
                    fwrite($fp, ob_get_clean());
                    fclose($fp);

                    $this->parent->output($path);
                }
            }
            else {
                $this->path = $this->process();

                ob_start();

                $this->parent->output($this->path);

                $fp = fopen($path, "w+");
                fwrite($fp, ob_get_clean());
                fclose($fp);

                $this->parent->output($path);
            }
        }
        else {
            $this->path = $this->process();

            $this->parent->output($this->path);
        }
    }

    function process() { }
}
