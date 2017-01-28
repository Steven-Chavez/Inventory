<?php
/**
 * PDO enabled container for product authentication
 *
 * Author: Steven
 * Date: 1/25/2017
 * Time: 6:51 PM
 * Version: 1.0
 */

class Product
{
    /**
     * @var product id for Product table; primary key
     */
    private $productId;
    /**
     * @var name of product
     */
    private $productName;
    /**
     * @var number to identify product; unique key
     */
    private $productNumber;
    /**
     * @var color of product
     */
    private $color;
    /**
     * @var number of products per case
     */
    private $numPerCase;
    /**
     * @var boolean identifying if product is new or not
     */
    private $brandNew;
    /**
     * @var type id identifies product type; foreign key
     */
    private $typeId;

    //###################################
    //  CONSTRUCTOR
    //###################################

    /**
     * Product constructor.
     */
    public function __construct($productId, $productName, $productNumber,
                                $color, $numPerCase, $brandNew, $typeId)
    {
        $this->setProductId($productId);
        $this->setProductName($productName);
        $this->setProductNumber($productNumber);
        $this->setColor($color);
        $this->setNumPerCase($numPerCase);
        $this->setBrandNew($brandNew);
        $this->setTypeId($typeId);
    }

    //###################################
    //  ACCESSOR METHODS
    //###################################

    /**
     * get id of product
     * @return Product
     */
    public  function getProductId()
    {
        return $this->productId;
    }

    /**
     * get name of product
     * @return name
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * get number of product
     * @return number
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * get color of product
     * @return color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * get number of products per case
     * @return number
     */
    public function getNumPerCase()
    {
        return $this->numPerCase;
    }

    /**
     * is product brand new
     * @return bool
     */
    public function isBrandNew()
    {
        return $this->brandNew;
    }

    /**
     * get type id of product
     * @return type
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################

    /**
     * Sets product id
     * @param $productId
     */
    public  function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Sets product name
     * @param $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * Sets product number
     * @param $productNumber
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
    }

    /**
     * Sets color
     * @param $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Sets number of product per case
     * @param $numPerCase
     */
    public function setNumPerCase($numPerCase)
    {
        $this->numPerCase = $numPerCase;
    }

    /**
     * Sets boolean if product is brand new or not
     * @param $brandNew
     */
    public  function setBrandNew($brandNew)
    {
        $this->brandNew = $brandNew;
    }

    /**
     * Sets type of product
     * @param $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
    public function insert(&$pdo)
    {
        $query = "INSERT INTO Product(ProductID, ProductName, "
            ."ProductNumber, Color, NumberPerCase, BrandNew, TypeID)"
            ."VALUES("
            .$this->productId . ","
            .$this->productName . ","
            .$this->productNumber . ","
            .$this->color . ","
            .$this->numPerCase . ","
            .$this->brandNew . ","
            .$this->typeId . ")";

        $pdo->query($query);
    }
}
?>