<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 15:33
 */

namespace TroisWA\Shop\Controller;


class CategoryController extends AbstractController {



    public function showAction(){
        $cat = $this->request->get('cat');
        $category = $this->getCategory($cat);
        $products = $this->getProductsByCat($cat);
        if (is_null($category)) {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            return $this->view->render("404.twig");
        }
        return $this->view->render("category/show.twig",
            [   "category" => $this->getCategory($cat),
                "product_thumbnails" => $products,
                "categories" => $this->getCategories()]);
    }

    private function getProductsByCat($cat)
    {
        return $this->dataSource->getProductsByCat($cat);

    }

    private function getCategory($cat){



        return $this->dataSource->getCategory($cat);

    }

}