<?php 

namespace TroisWA\Shop\Controller;

use Symfony\Component\HttpFoundation\Request;
use TroisWA\Shop\Model\Product;

class HomeController{

    private $request;
	private $view;

    /**
     * @param $request Request
     * @param $view \Twig_Environment
     */
	public function __construct($request, $view){
		$this->request = $request;
        $this->view = $view;
	}

	public function indexAction(){
		return $this->view->render("index.twig", ["product_thumbnails" => $this->getProducts(5)]);
	}

    private function getProducts($number)
    {
        return $this->generateProducts($number);
    }


    private function generateProducts($number)
    {
        $pictures = [
            "pic1.jpg", "pic2.jpg", "pic3.jpg", "pic4.jpg", "pic5.jpg",
            "pic6.jpg", "pic7.jpg", "pic8.jpg", "pic9.jpg", "pic10.jpg"
        ];

        $names = [
            "Abyssimal Runed War-axe",
            "Blessed Carvers' Helm of the Savage Archmagi",
            "Corrupt Eagle's Medicine of the Hex of Detect Robes",
            "Disrupting Pyramid of Cold Ball",
            "Fortuitous Pyramid",
            "Future Keepers' Trumpet of the Exceptional Charm of the Blue Armors",
            "Humans' Salve of Villainous Fire Disks",
            "Kingly Scintillating Bracer of Earth Rains",
            "Krakens' Knife of Insane Hearers",
            "Ointment of the Insect"
        ];

        $prices = [1, 2, 3, 3.99, 5.59, 8.70, 16.50, 13.75, 19.50, 15.20 ];

        $description = "Lorem Ipsum Dolor sic amet…";

        shuffle($pictures);
        shuffle($names);
        shuffle($prices);

        $products = [];

        for ($i = 0; $i < $number; ++$i) {
            $name = array_shift($names);
            $price = array_shift($prices);
            $rating = rand(0, 5);
            $products[] = new Product("", $name, $price, $description, $rating);
        }

        return $products;

    }

}