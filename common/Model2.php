<?php
namespace common;

class Model2 {
    public $type;
    public $cache;
    public $parent;
    public $result;

    function __construct($type, $cache, &$parent) {
        $this->type = $type;
        $this->cache = $cache;
        $this->parent = $parent;
        $this->result = $this->result();
    }

    function result() {
        $result = null;

        if($this->type == "SPL") {
            if($this->cache) {
                $result = $this->cache("SPL");
            }
            else {
                $result = $this->mine();
            }
        }
        else
        if($this->type == "CPL") {
            if($this->cache) {
                $result = $this->cache("CPL");
            }
            else {
                $result = $this->mine();
            }
        }

        return $result;
    }

    function cache($type) {
        $data = null;

        if($type == "SPL") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/cache/_m_{$this->parent->name}_{$this->parent->id}.php";
            $file = file_exists($path);

            if($file) {
                $alive = ((filemtime($path) + $this->parent->life) > time());

                if($alive) {
                    $data = unserialize(file_get_contents($path));
                }
                else {
                    $data = $this->mine();

                    $fp = fopen($path, "w+");
                    fwrite($fp, serialize($data));
                    fclose($fp);
                }
            }
            else {
                $data = $this->mine();

                $fp = fopen($path, "w+");
                fwrite($fp, serialize($data));
                fclose($fp);
            }
        }
        else
        if($type == "CPL") {
            $data = $this->mine();
        }

        return $data;
    }
}