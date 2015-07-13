<?php 

namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController{

    public function indexAction(){

		return $this->view->render("index.twig",
            ["product_thumbnails" => $this->getAllProducts(10),
            "carousel_products" => $this->getAllProducts(3),
            "categories" => $this->getCategories()]);
	}

    private function getAllProducts($limit)
    {
       return $this->dataSource->getAllProducts($limit);
    }
}