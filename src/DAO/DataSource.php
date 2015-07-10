<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 10/07/15
 * Time: 10:18
 */

namespace TroisWA\Shop\DAO;


class DataSource {

    private $connection;

    /**
     * @param $connection \PDO
     */
    public function __construct($connection)
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



    public function getCategory($cat){


        $sql = "SELECT * FROM `category` WHERE `id` = :cat";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':cat',  $cat);
        $requete->execute();
        $requete->setFetchMode(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Category");
        $category = $requete->fetch(\PDO::FETCH_CLASS);

        if(!$category){
            return null;
        }
        return $category;
    }


    public function getProductsByCat($cat)
    {

        $sql = "SELECT * FROM `product` WHERE `category_id` = :cat";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':cat',  $cat);
        $requete->execute();
        $products = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");

        if(empty($products)){
            return null;
        }
        return $products;
    }

    public function getAllProducts($limit = 5)
    {

        $sql = "SELECT * FROM `product` LIMIT 0,:limit";

        $requete = $this->connection->prepare($sql);
        // $requete->bindValue(":number", $number);
        $requete->bindValue(':limit',  $limit, \PDO::PARAM_INT);
        $requete->execute();
        $products = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");

        return $products;
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM `product` WHERE `id` = :id";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':id',  $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\Product");
        $product = $requete->fetch(\PDO::FETCH_CLASS);

        if(!$product){
            return null;
        }
        return $product;

    }

    public function getUsers(){
        $sql = "SELECT * FROM `user`";

        $requete = $this->connection->prepare($sql);

        $requete->execute();
        $users = $requete->fetchAll(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\User");
        return $users;
    }


    /**
     * @param $mail string
     * @return \TroisWA\Shop\Model\User
     */
    public function getUserFromMail($mail){

        $sql = "SELECT * FROM `user` WHERE `mail` = :mail";

        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':mail',  $mail);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS, "TroisWA\\Shop\\Model\\User");
        $product = $requete->fetch();

        if(!$product){
            return null;
        }
        return $product;
    }

    /**
     * @param $user \TroisWA\Shop\Model\User
     * @return boolean
     */
    public function addUser($user){

        $sql = "INSERT INTO  `shop`.`user` (`mail` ,`password`)
                    VALUES (:mail, :password )";
        $requete = $this->connection->prepare($sql);
        $requete->bindValue(':mail', $user->getMail());
        $requete->bindValue(':password', $user->getPassword());
        return $requete->execute();
    }





}