<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 06/07/15
 * Time: 10:51
 */

namespace TroisWA\Shop\Model;

/**
 * Class Product
 * @package TroisWA\Shop\Model
 */
class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $rating;
    private $picture;



//
//    function __construct($id, $name, $description, $price, $rating, $picture)
//    {
//        $this->id = $id;
//        $this->name = $name;
//        $this->description = $description;
//        $this->price = $price;
//        $this->rating = $rating;
//        $this->picture = $picture;
//    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function pictureUrl($size){
        return "img/product/$size/$this->id.jpg";
    }




}