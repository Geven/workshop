<?php
class Factory {
    static function getClass($ext) {
        $name = null;

        switch ($ext) {
            case "php":
                require($_SERVER["DOCUMENT_ROOT"] . "/common/ContentPHP.php");
                $name = "ContentPHP";

                break;

            case "js":
                require($_SERVER["DOCUMENT_ROOT"] . "/common/ContentJS.php");
                $name = "ContentJS";

                break;

            case "jpg":
                require($_SERVER["DOCUMENT_ROOT"] . "/common/ContentJPG.php");
                $name = "ContentJPG";

                break;

            default:
                require($_SERVER["DOCUMENT_ROOT"] . "/common/ContentNULL.php");
                $name = "ContentNULL";
        }

        return new $name();
    }
}