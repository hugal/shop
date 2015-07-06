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
    private $picture;
    private $name;
    private $price;
    private $description;
    private $rating;


    /**
     * @param $picture string
     * @param $name string
     * @param $price float
     * @param $description string
     * @param $rating int
     */
    function __construct($picture, $name, $price, $description, $rating)
    {
        $this->picture = $picture;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

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




}