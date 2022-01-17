<?php
class Controller extends BifrostRouter\BaseController {
    public static function run($request) {
        if($request->getMethod() == 'GET'){
            BifrostRouter\Twig::render('task3.html', require 'lab.conf.php');
        } else if(isset($_POST['request'])){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $_POST['request']);

            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Language: pl']);

            $result = curl_exec($ch);
            curl_close ($ch);

            if (self::isJson($result)){
                $result = json_decode($result, true);
                if(is_array($result) && array_key_exists('status', $result) && array_key_exists('data', $result)){
                    echo $result['data'];
                    return $result['status'];
                }
            } else {
                print_r($result); 
            }
            return 400;
        }
    }
    private static function isJson($string) {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
