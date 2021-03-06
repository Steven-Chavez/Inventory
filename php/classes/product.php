<?php
/**
 * PDO enabled container for product authentication
 *
 * Author: Steven
 * Date: 1/25/2017
 * Time: 6:51 PM
 * Version: 2.0
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
     * @var number of cases per pallet 
     */
    private $numPerPallet;
    /**
     * @var category id identifies product type; foreign key
     */
    private $categoryId;
    /**
     * @var image id; foreign key
     */
    private $imageId;

    //###################################
    //  CONSTRUCTOR
    //###################################

    /**
     * Product constructor.
     */
    public function __construct($productId, $productName, $productNumber,
                                $color, $numPerCase, $numPerPallet,
                                $categoryId, $imageId)
    {
        $this->setProductId($productId);
        $this->setProductName($productName);
        $this->setProductNumber($productNumber);
        $this->setColor($color);
        $this->setNumPerCase($numPerCase);
        $this->setNumPerPallet($numPerPallet);
        $this->setCategoryId($categoryId);
        $this->setImageId($imageId);
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
     * get number of cases per pallet
     * @return number
     */
    public function getNumPerPallet()
    {
        return $this->numPerPallet;
    }

    /**
     * get category id of product
     * @return id
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
    
    /**
     * get image id of product
     * @return id
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################

    /**
     * Sets product id
     * @param int $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Sets product name
     * @param string $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * Sets product number
     * @param string $productNumber
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
    }

    /**
     * Sets color
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Sets number of product per case
     * @param int $numPerCase
     */
    public function setNumPerCase($numPerCase)
    {
        $this->numPerCase = $numPerCase;
    }
    
    /**
     * Sets number of cases per pallet
     * @param int $numPerPallet
     */
    public function setNumPerPallet($numPerPallet)
    {
        $this->numPerPallet = $numPerPallet;
    }

    /**
     * Sets category id of product
     * @param int $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
    
    /**
     * Inserts new product data into DB
     * @param PDO $pdo
     */
    public function insert(&$pdo)
    {
        // SQL statement for inserting new product.
        $sql = "
            INSERT INTO Products(ProductName, ProductNumber,
                              Color, NumberPerCase, NumberPerPallet, 
                              CategoryId, ImageId) 
            VALUES(:pName, :pNumber, :color, :percase, :perpallet, 
                   :categoryId, :imgId)";

        // Prepare statement and bind parameters.
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pName', $this->productName, PDO::PARAM_STR);
        $stmt->bindParam(':pNumber', $this->productNumber, PDO::PARAM_STR);
        $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
        $stmt->bindParam(':percase', $this->numPerCase, PDO::PARAM_INT);
        $stmt->bindParam(':perpallet', $this->numPerPallet, PDO::PARAM_INT);
        $stmt->bindParam(':categoryId', $this->categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':imgId', $this->imageId, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Reads products by category Id
     * @param PDO $pdo
     * @param int $categoryId
     * @return OBJ
     */
    public static function readProductsByCategoryId(&$pdo, $categoryId)
    {
         // SQL statement that searches for product by category Id.
        $sql = "
          SELECT ProductId, ProductName, ProductNumber, Color,
            NumberPerCase, CategoryId
          FROM Products
          WHERE CategoryId=:categoryId
        ";

        // Prepare statement and bind parameters.
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        // Return data.
        return $stmt->fetchAll();
    }
    
    /**
     * Searches for product by name.
     * @param PDO $pdo
     * @param string $search
     * @return OBJ
     */
    public static function searchProduct(&$pdo, $search)
    {
        // SQL statement that searches for product name like search input.
        $sql = "
            SELECT ProductId, ProductName
            FROM Products
            WHERE ProductName LIKE :search;
        ";
        
        // Prepare statement and bind parameters.
        $stmt = $pdo->prepare($sql);
        //Prepare search variable LIKE condition
        $search = "%$search%";
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->execute();

        // Return data.
        return $stmt->fetchAll();
    }
}
