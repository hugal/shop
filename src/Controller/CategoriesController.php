<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 08/07/15
 * Time: 17:23
 */

namespace TroisWA\Shop\Controller;


class CategoriesController {

    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }


    public function getCategories(){
        $sql = "SELECT * FROM `category`";

        $requete = $this->connection->prepare($sql);

        $requete->execute();
        $categories = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Category");
        return $categories;
    }
}