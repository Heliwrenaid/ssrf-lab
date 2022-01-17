<?php

namespace BifrostRouter;
loadConfig();

class Twig {
    public static function render($template, $data = null){
        $loader = new \Twig\Loader\FilesystemLoader(VIEWS_DIR);
        $twig = new \Twig\Environment($loader,array());
        if($data == null){
            $twig->display($template);
        } else {
            $twig->display($template, $data);
        }
    }
}