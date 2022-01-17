<?php
class Controller extends BifrostRouter\BaseController {
    public static function run($request) {
        BifrostRouter\Twig::render('home.html');
        return 200;
    }
}
