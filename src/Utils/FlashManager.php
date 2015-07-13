<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 13/07/15
 * Time: 14:27
 */

namespace TroisWA\Shop\Utils;


class FlashManager {
    private $request;

    /**
     * @param $request Request
     */
    function __construct($request)
    {
        $this->request = $request;
    }

    function add($key, $value)
    {
        $_SESSION["flash"][$key] = $value;
    }

    function read($key, $default)
    {
        $value = $default;
        if (array_key_exists($key, $this->request->session("flash", array()))){
            $value = $this->request->session("flash")[$key];
            unset($_SESSION["flash"][$key]);
        }
        return $value;
    }

}