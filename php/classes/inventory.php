<?php
/**
 * PDO enabled container for inventory authentication
 * Author: Steven Chavez
 * Date: 1/28/2017
 * Time: 6:44 PM
 * Version: 2.0
 */

class Inventory
{
    //###################################
    //  FIELDS
    //###################################
    /**
     * @var id for product inventory
     */
    private $inventoryId;
    /**
     * @var id for product
     */
    private $productId;
    /**
     * @var id for location
     */
    private $locationId;
    /**
     * @var date of inventory
     */
    private $date;
    /**
     * @var quantity of product in inventory
     */
    private $quantity;

    //###################################
    //  CONSTRUCTOR
    //###################################
    public function __construct($inventoryId, $productId,
     $locationId, $date, $quantity)
    {
        $this->setInventoryId($inventoryId);
        $this->setProductId($productId);
        $this->setLocationId($locationId);
        $this->setDate($date);
        $this->setQuantity($quantity);
    }

    //###################################
    //  ACCESSOR METHODS
    //###################################
    /**
     * get id of inventory
     * @return mixed
     */
    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    /**
     * get id of product
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * get id of location
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * get date of inventory
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * get quantity of product in the inventory
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################

    /**
     * set id of inventory
     * @param mixed $inventoryId
     */
    public function setInventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;
    }

    /**
     * set id of product
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * set id of location of inventory
     * @param mixed $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * set date of inventory
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * set quantity of product in inventory
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
    public function insert(&$pdo)
    {
        $date = date("Y-m-d");

        $sql = "
            INSERT INTO ProductInventory(ProductId, LocationId, 
              InventoryDate, Quantity)
            VALUES(:productId, :locationId, :iDate, :quantity)
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':productId', $this->productId, PDO::PARAM_INT);
        $stmt->bindParam(':locationId', $this->locationId, PDO::PARAM_INT);
        $stmt->bindParam(':iDate', $date, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function readInventoryDates(&$pdo)
    {
        $sql = "
            SELECT InventoryDate FROM ProductInventory
            GROUP BY InventoryDate
            ORDER BY InventoryDate DESC;
        ";

        $stmt = $pdo->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public static function readInventoryProductJOIN(&$pdo, $typeId, $date)
    { 
        $sql = "
          SELECT p.ProductName, p.ProductNumber, p.Color, p.NumberPerCase, 
	        p.TypeId, i.InventoryDate, i.Quantity
          FROM Products p
          INNER JOIN ProductInventories i
          ON p.ProductId=i.ProductId
          WHERE i.InventoryDate = :iDate
          AND p.TypeId = :pType;
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":pType", $typeId, PDO::PARAM_INT);
        $stmt->bindParam(":iDate", $date, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public static function readInventoryByLocationAndDateSort(&$pdo, $iLocId, $locId)
    {
        $sql = " 
            SELECT 
                i.InventoryDate Date, p.ProductName Name, p.ProductNumber Number, 
                p.Color, i.Quantity, i.InventoryId Id
            FROM ProductInventories i
            INNER JOIN Products p
            ON i.ProductId=p.ProductId
            INNER JOIN InventoryLocations l
            ON l.InventoryLocationId=i.InventoryLocationId
            WHERE i.InventoryLocationId = :id
            AND l.LocationId = :locId
            ORDER BY i.InventoryDate DESC, i.ProductId;
            ";
        
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":id", $iLocId, PDO::PARAM_INT);
        $stmt->bindParam(":locId", $locId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public static function readInventoryByLocation(&$pdo, $locationId)
    {
      $sql = "
            SELECT p.ProductName, p.ProductNumber, p.Color, p.NumberPerCase,
                i.InventoryDate, i.Quantity, i.InventoryLocationId, p.InventoryId
            FROM Products p
            INNER JOIN ProductInventories i
            ON i.ProductId = p.ProductId
            INNER JOIN InventoryLocations il
            ON i.InventoryLocationId = il.InventoryLocationId
            WHERE il.LocationId = :locationId
            ORDER BY i.InventoryLocationId;
        ";
      
        // Prepare statment and bind parameters
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":locationId", $locationId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();     
    }
}