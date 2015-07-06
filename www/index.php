<?php 

require_once __DIR__ . "/../vendor/autoload.php";

$loader = new Twig_Loader_Filesystem(__DIR__."/../view");
$twig = new Twig_Environment($loader, 
			[
				"cache" => false
			]);

$dataSource = "mysql:host=localhost;dbname=shop;charset=utf8";
$login = "root";
$mdp = "troiswa";
$connection = new PDO($dataSource, $login, $mdp);

use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();

$controller = new \TroisWA\Shop\Controller\HomeController($request, $twig, $connection);

echo $controller->indexAction();



