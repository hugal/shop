<?php 

require_once __DIR__ . "/../vendor/autoload.php";


$loader = new Twig_Loader_Filesystem(__DIR__."/../view");
$twig = new Twig_Environment($loader, 
			[
				"cache" => false
			]);

$function = new Twig_SimpleFunction("image_or_default", function($size, $product){
    $path = $product->pictureUrl($size);
    if (file_exists($path)) {
        return $path;
    }
    return "img/product/$size/default.png";
});

$twig->addFunction($function);

$dataSource = "mysql:host=localhost;dbname=shop;charset=utf8";
$login = "root";
$mdp = "troiswa";
$connection = new PDO($dataSource, $login, $mdp);


//pour utiliser le request venant de httpfoundation
//use Symfony\Component\HttpFoundation\Request;
//$request = Request::createFromGlobals();

//pour utiliser le request de la classe request
$request = new TroisWA\Shop\Utils\Request($_GET);


//$controller = new \TroisWA\Shop\Controller\HomeController($request, $twig, $connection);
//
//echo $controller->indexAction();




$page = $request->get("page", "index");
switch ($page) {
    case "index":
        $controller = new \TroisWA\Shop\Controller\HomeController($request, $twig, $connection);
        echo $controller->indexAction();
        break;
    case "product":
        $controller = new \TroisWA\Shop\Controller\ProductController($request, $twig, $connection);
        echo $controller->showAction();
        break;
    case "category":
        $controller = new \TroisWA\Shop\Controller\CategoryController($request, $twig, $connection);
        echo $controller->categoryAction();
        break;
    default:
        echo $twig->render("404.twig");

}