<?php 

namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController{





    public function indexAction(){

		return $this->view->render("index.twig",
            ["product_thumbnails" => $this->getProducts(10),
            "carousel_products" => $this->getProducts(3),
            "categories" => $this->getCategories()]);
	}

    private function getProducts($number)
    {

        $sql = "SELECT * FROM `product` LIMIT 0,:number";

        $requete = $this->connection->prepare($sql);
        // $requete->bindValue(":number", $number);
        $requete->bindValue(':number',  $number, \PDO::PARAM_INT);
        $requete->execute();
        $products = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");

        return $products;


    }








}