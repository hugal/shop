<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 09/07/15
 * Time: 12:13
 */

namespace TroisWA\Shop\Controller;


abstract class AbstractController {
    protected $request;
    protected $view;

    /**
     * @var  \TroisWA\Shop\DAO\DataSource
     */
    protected $dataSource;

    /**
     * @param $request \TroisWA\Shop\Utils\Request
     * @param $view \Twig_Environment
     * @param $dataSource \TroisWA\Shop\DAO\DataSource
     */
    function __construct($request, $view, $dataSource)
    {
        $this->request = $request;
        $this->view = $view;
        $this->dataSource = $dataSource;
    }

    public function getCategories(){
        return $this->dataSource->getCategories();
    }

}