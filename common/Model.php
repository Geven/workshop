<?php
namespace common;

class Model {
    public $owner;
    public $data;

    function __construct($owner) {
        $this->owner = $owner;
        $this->populate();
    }

    function populate() {
        if($this->owner->cache) {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/cache/_m_{$this->owner->name}_{$this->owner->id}.php";
            $file = file_exists($path);
            if($file) {
                $alive = ((filemtime($path) + $this->owner->life) > time());

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

    function process() {
    }
}