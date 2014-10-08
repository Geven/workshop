<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Model.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/View.php");

class Component {
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

    function __construct($ns, $name, $template, $cache, $life, $settings, $parent, $ignore = false) {
        $nested = (get_class($parent) != "ContentPHP");

        if($nested) {
            if($parent->cache) {
                if($ignore) {
                    //ничего не делаем :)
                }
                else {
                    $array = array();

                    foreach($settings as $key => $val) {
                        array_push($array, "\"$key\"=>\"$val\"");
                    }

                    echo "</br>";
                    echo '<?php $component = new Component(' . "\"$ns\", \"$name\", \"$template\", " . (($cache) ? "true" : "false") . ", $life, " . ("array(" . implode(",", $array) . ")") . ", " . "\$this, true); ?>";
                    echo "</br>";

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
        $this->id = hash("md5",($this->ns . $this->name . $this->template . implode("", $this->settings)));

        $m = "\\$this->ns\\$this->name\\" . "Model";
        $v = "\\$this->ns\\$this->name\\" . "View";

        require_once($this->getFile("m"));
        require_once($this->getFile("v"));

        $this->m = new $m($this);
        $this->v = new $v($this);
    }

    private function getFile($type) {
        $name = ($type == "m") ? "Model" : "View";
        $path = null;

        if($this->ns == "local") {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/component/{$this->name}/{$name}.php";
        }
        else {
            $path = $_SERVER["DOCUMENT_ROOT"] . "/common/component/{$this->name}/{$name}.php";
        }

        if(file_exists($path)) {
            return $path;
        }
        else {
            exit("ERROR: can't find {$name}.php for component {$this->name} in ns: {$this->ns}.");
        }
    }

    function output($path) {
        require($path);
    }
}