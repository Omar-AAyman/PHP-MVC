<?php


namespace app\core;

class Response
{
    

    public static function json($data)
    {
        return json_encode($data,JSON_FORCE_OBJECT);
    }

    public static function output($data)
    {
        if (! $data) {
            return ;
        }
        if (! is_string($data)) {
            return $data = static::json($data);
        }
        echo $data;
    }
    
    public function setStatusCode(int $code){
        http_response_code($code);
    }

    public function redirect(string $url){
        header('location: ' .$url);
    }
    
}
