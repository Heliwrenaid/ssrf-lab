<?php
class Controller extends BifrostRouter\BaseController {
    public static function run($request) {
        if(isset($_GET['resource'])){
            if(isDirectoryBlocked($_GET['resource'])){
                return 403;
            }

            $fp = fopen($_GET['resource'], "rb");
            fpassthru($fp);
        } else {
            BifrostRouter\Twig::render('task1.html');
        }

    }
}
