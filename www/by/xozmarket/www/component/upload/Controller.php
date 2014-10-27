<?php
class Controller {
    function __construct() {
    }

    function process() {

        $today = date("d.m.y");
        $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/storage/{$today}";
        $file = file_exists($path);

        if($file) {

        }
        else {
            mkdir($path);
        }

        $uid = "12345"; //mt_rand();

        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        }
        else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $path . "/" . $uid . ".jpg");

            echo "<img src=\"/storage/{$today}/{$uid}.jpg\"><div><a href=\"/component/upload/pipe.php?action=delete&name=/storage/{$today}/{$uid}.jpg\">Удалить</a></div>";
        }




        /*$id = mt_rand();

        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
            echo '<img src="">';
        }

        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "upload/" . $_FILES["file"]["name"]);
            echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        }*/
    }
}