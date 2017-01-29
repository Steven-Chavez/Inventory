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
                                $color, $numPerCase, $typeId)
    {
        $this->setProductId($productId);
        $this->setProductName($productName);
        $this->setProductNumber($productNumber);
        $this->setColor($color);
        $this->setNumPerCase($numPerCase);
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
        $sql = "
            INSERT INTO Product(ProductName, ProductNumber,
                              Color, NumberPerCase, TypeID) 
            VALUES(:pName, :pNumber, :color, :percase, :typeId)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pName', $this->productName, PDO::PARAM_STR);
        $stmt->bindParam(':pNumber', $this->productNumber, PDO::PARAM_STR);
        $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
        $stmt->bindParam(':percase', $this->numPerCase, PDO::PARAM_INT);
        $stmt->bindParam(':typeId', $this->typeId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function readProductsByTypeId(&$pdo, $typeId)
    {

        $sql = "
          SELECT ProductId, ProductName, ProductNumber, Color,
            NumberPerCase, TypeId
          FROM Product
          WHERE TypeId=:typeId
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(':typeId', $typeId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
?>