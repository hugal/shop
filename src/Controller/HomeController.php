<?php 

namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;
use TroisWA\Shop\Model\Product;

class HomeController{

    private $request;
	private $view;
    private $connection;


    /**
     * @param $request Request
     * @param $view \Twig_Environment
     * @param $connection \PDO
     */
    public function __construct($request, $view, $connection){
        $this->request = $request;
        $this->view = $view;
        $this->connection = $connection;
    }

    public function indexAction(){
		return $this->view->render("index.twig",
            ["product_thumbnails" => $this->getProducts(5),
            "carousel_products" => $this->getProducts(3)]);
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