<?php
class Captcha {
    public $count;
    public $secret;

    function __construct() {
        $this->count = \SessionCheck::mine("count");
        $this->secret = \SessionCheck::mine("secret");
    }

    function plus() {
        $value = SessionCheck::mine("count");
        if($value) {
            $_SESSION["count"] ++;
        }
        else {
            $_SESSION["count"] = 1;
        }
    }

    function reset() {
        $value = SessionCheck::mine("count");
        if($value) {
            $_SESSION["secret"] = null;
            $_SESSION["count"] = null;
        }
        else {
            $_SESSION["secret"] = null;
            $_SESSION["count"] = 0;
        }
    }

    function generate() {
        //Let's generate a totally random string using md5
        $md5_hash = md5(rand(0,999));
        //We don't need a 32 character long string so we trim it down to 5
        $secret = substr($md5_hash, 15, 5);

        //Set the session to store the security code
        $_SESSION["secret"] = $secret;

        //Set the image width and height
        $width = 100;
        $height = 20;

        //Create the image resource
        $image = ImageCreate($width, $height);

        //We are making three colors, white, black and gray
        $white = ImageColorAllocate($image, 255, 255, 255);
        $black = ImageColorAllocate($image, 0, 0, 0);
        $grey = ImageColorAllocate($image, 204, 204, 204);

        //Make the background black
        ImageFill($image, 0, 0, $black);

        //Add randomly generated string in white to the image
        ImageString($image, 3, 30, 3, $secret, $white);

        //Throw in some lines to make it a little bit harder for any bots to break
        ImageRectangle($image,0,0,$width-1,$height-1,$grey);
        imageline($image, 0, $height/2, $width, $height/2, $grey);
        imageline($image, $width/2, 0, $width/2, $height, $grey);

        //Tell the browser what kind of file is come in
        //header("Content-type: image/jpeg, charset=UTF-8");

        //Output the newly created image in jpeg format
        $today = date("d.m.y");
        $path = $_SERVER["DOCUMENT_ROOT"] . "{$GLOBALS["router"]->root}/captcha/{$today}";
        $file = file_exists($path);

        if($file) {

        }
        else {
            mkdir($path);
        }

        $uid = session_id();

        ImageJpeg($image, $path . "/" . $uid . ".jpg");

        //Free up resources
        ImageDestroy($image);
    }
}