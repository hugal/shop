<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 07/07/15
 * Time: 12:23
 */



require_once __DIR__ . "/../vendor/autoload.php";

use \Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = Setup::createAnnotationMetadataConfiguration([__DIR__."/../src/Model"], true);

$dbConfig = $conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'troiswa',
    'dbname'   => 'doctrine_shop',
);

$entityManager = EntityManager::create($conn, $config);


