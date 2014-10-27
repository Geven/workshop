<?php
class Base{
    function toGlobal() {
        $GLOBALS[get_class($this)] = $this;
    }
}