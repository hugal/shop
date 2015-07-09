<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 15:14
 */

namespace TroisWA\Shop\Utils;


class Request{
    private $get;
    private $post;
    public function __construct($get, $post){
        $this->get = $get;
        $this->post = $post;
    }
    public function get($key, $default=null){
        return array_key_exists($key, $this->get) ? $this->get[$key] : $default;
    }

    public function post($key, $default=null){
        return array_key_exists($key, $this->post) ? $this->post[$key] : $default;
    }
}