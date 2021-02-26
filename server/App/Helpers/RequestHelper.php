<?php


namespace Helpers;


class RequestHelper
{

    public static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function input()
    {
        if($this->isJson()){

        }
    }

    /**
     * Determine if the request is sending JSON.
     *
     * @return bool
     */
    public function isJson()
    {
        return StrHelper::contains($this->header('CONTENT_TYPE'), ['/json', '+json']);
    }

    /**
     * 获取header内容
     *
     * @param  string|null  $key
     * @param  string|array|null  $default
     * @return string|array|null
     */
    public function header($key = null, $default = null)
    {
        return $this->retrieveItem($key, $default);
    }

    public function retrieveItem($key, $default)
    {
        $headers = $this->getAllHeaders();
        if($key){
            if(isset($headers[$key])){
                return $headers[$key];
            }else{
                return $default;
            }
        }else{
            return $headers;
        }
    }

    /**
     * Gets the HTTP headers.
     *
     * @return array
     */
    public function getAllHeaders(){
        $headers = [];
        foreach($_SERVER as $key=>$value){
            if(substr($key, 0, 5)==='HTTP_'){
                $key = substr($key, 5);
                $key = str_replace('_', ' ', $key);
                $key = str_replace(' ', '-', $key);
                $key = strtolower($key);
                $headers[$key] = $value;
            }
        }
        return $headers;
    }


}