<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 15:33
 */

namespace TroisWA\Shop\Controller;


class CategoryController extends AbstractController {



    public function categoryAction(){
        $cat = $this->request->get('cat');
        $category = $this->getCategory($cat);
        $products = $this->getProducts($cat);
        if (is_null($category)) {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            return $this->view->render("404.twig");
        }
        return $this->view->render("category.twig",
            [   "category" => $this->getCategory($cat),
                "product_thumbnails" => $products,
                "categories" => $this->getCategories()]);
    }

    private function getProducts($cat)
    {

        $sql = "SELECT * FROM `product` WHERE `category_id` = :cat";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':cat',  $cat);
        $requete->execute();
        $products = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");

        if(empty($products)){
            return null;
        }
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