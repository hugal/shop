<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

$request = new TroisWA\Shop\Utils\Request($_GET, $_POST, $_SESSION);

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

$twig->addGlobal('session', $_SESSION);

$flash = new \TroisWA\Shop\Utils\FlashManager($request);
$twig->addGlobal('flash', $flash);

$dataSource = "mysql:host=localhost;dbname=shop;charset=utf8";
$login = "root";
$mdp = "troiswa";
$connection = new PDO($dataSource, $login, $mdp);

//pour utiliser le request venant de httpfoundation
//use Symfony\Component\HttpFoundation\Request;
//$request = Request::createFromGlobals();

//pour utiliser le request de la classe request

$dataSource = new \TroisWA\Shop\DAO\DataSource($connection);

$page = $request->get("page", "index");

//switch ($page) {
//    case "index":
//        $controller = new \TroisWA\Shop\Controller\HomeController($request, $twig, $dataSource);
//        echo $controller->indexAction();
//        break;
//    case "product":
//        $controller = new \TroisWA\Shop\Controller\ProductController($request, $twig, $dataSource);
//        echo $controller->showAction();
//        break;
//    case "category":
//        $controller = new \TroisWA\Shop\Controller\CategoryController($request, $twig, $dataSource);
//        echo $controller->showAction();
//        break;
//    case "signup":
//        $controller = new \TroisWA\Shop\Controller\UserController($request, $twig, $dataSource);
//        echo $controller->signupAction();
//        break;
//    case "signup_form":
//        $controller = new \TroisWA\Shop\Controller\UserController($request, $twig, $dataSource);
//        echo $controller->signupFormAction();
//        break;
//    case "signin":
//        $controller = new \TroisWA\Shop\Controller\UserController($request, $twig, $dataSource);
//        echo $controller->signinAction();
//        break;
//    default:
//        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
//        echo $twig->render("404.twig", ["categories" => $dataSource->getCategories()]);
//
//}

$config = [
    "index" => ["controller" => "Home", "action" => "index"],
    "product" => ["controller" => "Product", "action" => "show"],
    "category" => ["controller" => "Category", "action" => "show"],
    "signup" => ["controller" => "User", "action" => "signup"],
    "signup_form" => ["controller" => "User", "action" => "signupForm"],
    "signin" => ["controller" => "User", "action" => "signin"],
    "signout" => ["controller" => "User", "action" => "signout"]
];

function route($page, $config, $request, $view, $dataSource, $flash) {
    if (!array_key_exists($page, $config)) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        return $view->render("404.twig", ["categories" => $dataSource->getCategories()]);

    }
    $controllerClass = "TroisWA\\Shop\\Controller\\".$config[$page]["controller"]."Controller";
    $action = $config[$page]["action"]."Action";
    $controller = new $controllerClass($request, $view, $dataSource, $flash);

    return $controller->$action();

}

echo route($page, $config, $request, $twig, $dataSource, $flash);

//unset($_SESSION["flash"]);

