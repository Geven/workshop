<?php
$GLOBALS["json"] = (object) null;

if(isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];

    switch($action) {
        case "logout":
            logout();
            break;
    }
}

function logout() {
    $GLOBALS["json"]->status = "Ok";

    $_SESSION["authorized"] = false;
    $_SESSION["name"] = null;
}

echo json_encode($GLOBALS["json"]);
