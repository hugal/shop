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
    protected $connection;

    /**
     * @param $request \TroisWA\Shop\Utils\Request
     * @param $view \Twig_Environment
     * @param $connection \PDO
     */
    function __construct($request, $view, $connection)
    {
        $this->request = $request;
        $this->view = $view;
        $this->connection = $connection;
    }

    public function getCategories(){
        $sql = "SELECT * FROM `category`";

        $requete = $this->connection->prepare($sql);

        $requete->execute();
        $categories = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Category");
        return $categories;
    }

}