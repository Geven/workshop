<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/View.php");

class Component {
    const M = "Model";
    const V = "View";

    public $type;
    public $ns;
    public $name;
    public $template;
    public $cache;
    public $life;
    public $settings;
    public $parent;
    public $id;
    public $m;
    public $v;

    function __construct($type, $ns, $name, $template, $cache, $life, $settings, $parent) {
        $this->type = $type;
        $this->ns = $ns;
        $this->name = $name;
        $this->template = $template;
        $this->cache = $cache;
        $this->life = $life;
        $this->settings = $settings;
        $this->parent = $parent;

        $this->setID();

        $m = "\\$this->ns\\$this->name\\" . Component::M;
        $v = "\\$this->ns\\$this->name\\" . Component::V;

        require_once($this->file("m"));
        require_once($this->file("v"));

        $this->m = new $m($this->type, $this->cache, $this);
        $this->v = new $v($this->type, $this->cache, $this);

        $this->output();
    }

    function file($type) {
        $name = null;
        $path = null;

        if($type == "m") {
            $name = Component::M ;
        }
        else
            if($type == "v") {
                $name = Component::V ;
            }

        if($this->ns == "local") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/{$this->name}/{$name}.php";
        }
        else
            if($this->ns == "common") {
                $path = $_SERVER["DOCUMENT_ROOT"] . "/common/component/{$this->name}/{$name}.php";
            }

        if(file_exists($path)) {
            return $path;
        }
        else {
            exit("ERROR: can't find {$name}.php for component {$this->name} in ns: {$this->ns}.");
        }
    }

    function setID() {
        $this->id = hash("md5",($this->ns . $this->name . $this->template . implode("", $this->settings)));
    }

    function output() {
        require($this->v->result);
    }
}