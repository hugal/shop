<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 10:23
 */


namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;

class ProductController{

    private $request;
    private $view;
    private $connection;
    private $cat;


    /**
     * @param $request Request
     * @param $view \Twig_Environment
     * @param $connection \PDO
     */
    public function __construct($request, $view, $connection, $cat){
        $this->request = $request;
        $this->view = $view;
        $this->connection = $connection;
        $this->cat = $cat;
    }

    public function showAction(){
        $id = $this->request->get('id');
        $product = $this->getProduct($id);
        if (is_null($id) || is_null($product)) {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            return $this->view->render("404.twig");
        }
        return $this->view->render("product/show.twig",
            ["product" => $product,
            "categories" => $this->cat->getCategories()]);
    }

    private function getProduct($id)
    {


        $sql = "SELECT * FROM `product` WHERE `id` = :id";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':id',  $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");
        $product = $requete->fetch(\PDO::FETCH_CLASS);

        if(!$product){
            return null;
        }
        return $product;

    }

}