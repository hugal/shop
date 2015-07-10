<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 10:23
 */


namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController{


    public function showAction(){
        $id = $this->request->get('id');
        $product = $this->getProduct($id);
        if (is_null($id) || is_null($product)) {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            return $this->view->render("404.twig", ["categories" => $this->getCategories()]);
        }
        return $this->view->render("product/show.twig",
            ["product" => $product,
            "categories" => $this->getCategories(),
            "category" => $this->dataSource->getCategory($product->getCategoryId())]);
    }


    /**
     * @param $id int
     * @return \TroisWA\Shop\Model\Product
     */
    private function getProduct($id)
    {
        return $this->dataSource->getProduct($id);
    }


}