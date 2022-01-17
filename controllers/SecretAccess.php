<?php
class Controller extends BifrostRouter\BaseController {
    public static function run($request) {
        if (empty($request->vars[0])){
            return 400;
        }

        if(isDirectoryBlocked($request->vars[0])){
            return 403;
        }

		$whitelist = ['127.127.127.127', '127.0.1.3'];

        if (!in_array($_SERVER['HTTP_HOST'], $whitelist)) {
            echo json_encode(array('status' => 403, 'data' => '<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">Hint</a>'));
            return 403;
        }

        if (file_exists('secretDir/' . $request->vars[0])){
            echo json_encode(array('status' => 200, 'data' => file_get_contents('secretDir/' . $request->vars[0])));
            return 200;
        } else {
            return 404;
        }
        
    }
}
