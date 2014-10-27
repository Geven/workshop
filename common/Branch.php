<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/View.php");

class Branch {
    const M = "Model";
    const V = "View";

    public $ns;
    public $name;
    public $template;
    public $cache;
    public $life;
    public $settings;
    public $parent;
    public $id;

    function __construct($ns, $name, $template, $cache, $life, $settings, $parent, $ignore = false) {
        $nested = (get_class($parent) != "Tree");

        if($nested) {
            if($parent->cache) {
                if($ignore) {
                    //ничего не делаем - идем дальше выполнять блок кода :)
                }
                else {
                    $array = array();

                    foreach($settings as $key => $val) {
                        array_push($array, "\"$key\"=>\"$val\"");
                    }

                    echo "\n";
                    echo '<?php $branch = new Branch(' . "\"$ns\", \"$name\", \"$template\", " . (($cache) ? "true" : "false") . ", $life, " . ("array(" . implode(",", $array) . ")") . ", " . "\$this, true); ?>";
                    echo "\n";

                    return;
                }
            }
        }

        $this->ns = $ns;
        $this->name = $name;
        $this->template = $template;
        $this->cache = $cache;
        $this->life = $life;
        $this->settings = $settings;
        $this->parent = $parent;

        $this->setID();

        $m = "\\$this->ns\\$this->name\\" . Branch::M;
        $v = "\\$this->ns\\$this->name\\" . Branch::V;

        require_once($this->file("m"));
        require_once($this->file("v"));

        $this->m = new $m($this);
        $this->v = new $v($this);
    }

    function output($path) {
        require($path);
    }

    function setID() {
        $this->id = hash("md5",($this->ns . $this->name . $this->template . implode("", $this->settings)));
    }

    function file($type) {
        $name = null;
        $path = null;

        if($type == "m") {
            $name = Branch::M ;
        }
        else
        if($type == "v") {
            $name = Branch::V ;
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
            exit("ERROR: can't find {$name}.php for branch {$this->name} in ns: {$this->ns}.");
        }
    }
}