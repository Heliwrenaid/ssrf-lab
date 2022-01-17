<?php
function loadConfig(){
    require __DIR__ . '/../../config.php';
}

function isDirectoryBlocked($dir) {
    if (preg_match('~^local~', $dir)){
        return true;
    }
    if (preg_match('~^/local~', $dir)){
        return true;
    }
    if (preg_match('~^secretDir~', $dir)){
        return true;
    }
    if (preg_match('~^/secretDir~', $dir)){
        return true;
    }
    return false;
}

function isHostAllowed($host) {
    
}