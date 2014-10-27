<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "xozmarket");

$GLOBALS["json"] = (object) null;

if(isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];

    switch($action) {
        case "register":
            register();
            break;
    }
}

function register() {
    /*
    if(!isset($_SESSION["register"])) {
        $_SESSION["register"] = 0;
    }
    else {
        $_SESSION["register"]++;
    }

    if($_SESSION["register"] == 3) {
        $captcha = hash("md5", time());
    }
    */

    if(!validate("name")) {
        $GLOBALS["json"]->status = "Error: name not valid";
        return;
    }

    if(!validate("email")) {
        $GLOBALS["json"]->status = "Error: email not valid";
        return;
    }

    if(!validate("password1")) {
        $GLOBALS["json"]->status = "Error: password1 not valid";
        return;
    }

    if(!validate("password2")) {
        $GLOBALS["json"]->status = "Error: password2 not valid";
        return;
    }

    $mysqli = new mysqli(HOST, USER, PASSWORD, DB);

    if ($mysqli->connect_errno) {
        $GLOBALS["json"]->status = "Failed to connect to MySQL: " + $mysqli->connect_error;
    }

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password1 = $_REQUEST["password1"];
    $password2 = $_REQUEST["password2"];

    if(match($mysqli, $email)) {
        $GLOBALS["json"]->status = "Already exists";
    }
    else {
        $type = "seller";
        $created = time();
        $secret = hash("md5", $created);

        $query = "INSERT INTO `xozmarket`.`user` (`id`, `type`, `name`, `email`, `password`, `confirmation`, `secret`, `created`, `log`) VALUES(NULL, '{$type}', '{$name}', '{$email}', '{$password1}', 0, '{$secret}', '{$created}', NULL)" or die("Error in the consult.." . mysqli_error($link));
        $mysqli->query($query);

        $GLOBALS["json"]->status = "User created";

        $to      = 'twegostar@localhost';
        $subject = 'the subject';
        $message = '<!DOCTYPE html><html><head><meta charset="utf-8"></head><body><a href="http://www.xozmarket.by/component/passport/controller.php?action=confirm&secret=' . $secret . '">Подвердить</a></body></html>';
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)) {
            $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/email/index.php";


            $fp = fopen($path, "w+");
            fwrite($fp, $message);
            fclose($fp);
        }
    }

    $mysqli->close();
}

function validate($type) {
    $result = false;

    if($type == "name") {
        if(isset($_REQUEST["name"])) {
            //do validation
            $result = true;
        }
    }
    else
    if($type == "email") {
        if(isset($_REQUEST["email"])) {
            //do validation
            $result = true;
        }
    }
    else
    if($type == "password1") {
        if(isset($_REQUEST["password1"])) {
            //do validation
            $result = true;
        }
    }
    else
        if($type == "password2") {
            if(isset($_REQUEST["password2"])) {
                //do validation
                $result = true;
            }
        }

    return $result;
}

function match(&$mysqli, $email) {
    $result = $mysqli->query("SELECT * FROM user WHERE email='{$email}'");

    if($result->num_rows > 0) {
        return true;
    }
    else {
        return false;
    }
}

echo json_encode($GLOBALS["json"]);
