<?php
require($_SERVER["DOCUMENT_ROOT"] . "/common/Content.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Session.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Captcha.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/DBManager.php");
require($_SERVER["DOCUMENT_ROOT"] . "/common/Tree.php");

class ContentPHP extends Content {
    function __construct() {
    }

    function output() {
        session_id(Session::getID());//TODO надежный сессионный ключ
        session_start();

        if(ob_get_level() == 0) {
            ob_start();
        }

        $tree = new Tree();

        ob_flush();
        flush();
    }
}
