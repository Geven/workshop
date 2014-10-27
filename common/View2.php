<?php
namespace common;

class View {
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
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/cache/_v_{$this->parent->name}_{$this->parent->id}.php";
            $file = file_exists($path);

            if($file) {
                $alive = ((filemtime($path) + $this->parent->life) > time());

                if($alive) {
                    $data = $path;
                }
                else {
                    ob_start();

                    require($this->mine());

                    $fp = fopen($path, "w+");
                    fwrite($fp, ob_get_clean());
                    fclose($fp);

                    $data = $path;
                }
            }
            else {
                ob_start();

                require($this->mine());

                $fp = fopen($path, "w+");
                fwrite($fp, ob_get_clean());
                fclose($fp);

                $data = $path;
            }
        }
        else
        if($type == "CPL") {
            $data = $this->mine();
        }

        return $data;
    }

    function template() {
        if($this->parent->ns == "local") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/{$this->parent->name}/template/{$this->parent->template}/{$this->parent->template}.php";
            $file = file_exists($path);

            if($file) {
                return $path;
            }
            else {
                $this->error();
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
                $this->error();
            }
        }
    }

    function error() {
        echo "ERROR: can't find template {$this->parent->template}.php for component {$this->parent->name}.";
        exit();
    }
}
