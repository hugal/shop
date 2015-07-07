<?php

namespace TroisWA\Shop\Model;

/**
* @Entity @Table(name="product")
**/
class Product
{
    /**
     * @var int
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @Column(type="string")
     */
    private $name;

    /**
     * @var float
     * @Column(type="float")
     */
    private $price;

    /**
     * @var string
     * @Column(type="string")
     */
    private $description;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $rating;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Product constructor.
     * @param $picture
     * @param $name
     * @param $price
     * @param $description
     * @param $rating
     */
    /* public function __construct($picture, $name, $price, $description, $rating)
    {
    $this->picture = $picture;
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
    $this->rating = $rating;
    }*/

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

    public function pictureUrl($size)
    {
        return "img/product/$size/$this->id.jpg";
    }
}