<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 15:33
 */

namespace TroisWA\Shop\Controller;


class CategoryController {

    private $request;
    private $view;
    private $connection;


    /**
     * @param $request \TroisWA\Shop\Utils\Request
     * @param $view \Twig_Environment
     * @param $connection \PDO
     */
    public function __construct($request, $view, $connection){
        $this->request = $request;
        $this->view = $view;
        $this->connection = $connection;
    }

    public function categoryAction(){
        return $this->view->render("category.twig",
            ["category" => $this->getCategory($this->request->get('cat')),
                "product_thumbnails" => $this->getProducts($this->request->get('cat'))]);
    }

    private function getProducts($cat)
    {

        $sql = "SELECT * FROM `product` WHERE `category_id` = :cat";

        $requete = $this->connection->prepare($sql);
        // $requete->bindValue(":number", $number);
        $requete->bindValue(':cat',  $cat);
        $requete->execute();
        $products = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");

        return $products;


    }

    private function getCategory($cat){


        $sql = "SELECT * FROM `category` WHERE `id` = :cat";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':cat',  $cat);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Category");
        $category = $requete->fetch(\PDO::FETCH_CLASS);

        if(!$category){
            return null;
        }
        return $category;

    }

}