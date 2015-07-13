<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 09/07/15
 * Time: 12:13
 */

namespace TroisWA\Shop\Controller;


use TroisWA\Shop\DAO\DataSource;
use TroisWA\Shop\Utils\FlashManager;
use TroisWA\Shop\Utils\Request;

abstract class AbstractController {
    protected $request;
    protected $view;

    /**
     * @var  \TroisWA\Shop\DAO\DataSource
     */
    protected $dataSource;

    protected $flash;

    /**
     * @param $request Request
     * @param $view \Twig_Environment
     * @param $dataSource DataSource
     * @param $flash FlashManager
     */
    function __construct($request, $view, $dataSource, $flash)
    {
        $this->request = $request;
        $this->view = $view;
        $this->dataSource = $dataSource;
        $this->flash = $flash;
    }

    public function getCategories(){
        return $this->dataSource->getCategories();
    }

}