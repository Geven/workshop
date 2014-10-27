<?php
namespace common;

class Model {
    public $parent;
    public $data;

    function __construct($parent) {
        $this->parent = $parent;
        $this->mine();
    }

    function mine() {
        if($this->parent->cache) {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/cache/_m_{$this->parent->name}_{$this->parent->id}.php";
            $file = file_exists($path);

            if($file) {
                $alive = ((filemtime($path) + $this->parent->life) > time());

                if($alive) {
                    $this->data = unserialize(file_get_contents($path));
                }
                else {
                    $this->data = $this->process();

                    $fp = fopen($path, "w+");
                    fwrite($fp, serialize($this->data));
                    fclose($fp);
                }
            }
            else {
                $this->data = $this->process();

                $fp = fopen($path, "w+");
                fwrite($fp, serialize($this->data));
                fclose($fp);
            }
        }
        else {
            $this->data = $this->process();
        }
    }

    function process() {}
}