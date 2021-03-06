<?php
/**
 * PDO enabled container for inventory location 
 * type authentication
 * 
 * Author: Steven Chavez
 * Date: 5/8/2017
 * Time: 6:19PM
 * Version: 1.0
 * File: inventory-locations.php
 */

class InventoryLocation
{
    //###################################
    //  FIELDS
    //###################################
    /**
     * @var id for inventory location. Primary key. 
     */
    private $inventoryLocationId;
    /**
     * @var id for location. Foreign key. 
     */
    private $locationId;
    /**
     * @var name of inventory location. 
     */
    private $name;
    /**
     * @var section of inventory location 
     */
    private $section;

    //###################################
    //  CONSTRUCTOR
    //###################################
    public function _construct($inventoryLocationId, 
            $locationId, $name, $section)
    {
        $this->setInventoryLocationId($inventoryLocationId);
        $this->setLocationId($locationId);
        $this->setName($name);
        $this->setSection($section);
    }

    //###################################
    //  ACCESSOR METHODS
    //###################################
    /**
     * get id for inventory location.
     * @return int
     */
    public function getInventoryLocationId()
    {
        return $this->inventoryLocationId;
    }
    
    /**
     * get id for location
     * @return string
     */
    public function getLocationId() 
    {
        return $this->locationId;
    }
    
    /**
     * get name of inventory location
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * get section of inventory location
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################
    /**
     * set inventory location id
     * @param int $inventoryLocationId
     */
    public function setInventoryLocationId($inventoryLocationId)
    {
        $this->inventoryLocationId = $inventoryLocationId;
    }
    
    /**
     * set location id
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }
    
    /**
     * set name for inventory location
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * set section for inventory location
     * @param string $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
    
    public static function readInventoryLocationBylocation
                           (&$pdo, $locationId)
    {
       // SQL statement that gets all InventoryLocation names of a location.
        $sql = "
          SELECT il.InventoryLocationId Id, il.LocationName Name
          FROM InventoryLocations il
          INNER JOIN Locations l
          ON il.LocationId=l.LocationId
          WHERE l.LocationId = :locationId
          ORDER BY il.InventoryLocationId;
        ";
       
        // Prepare SQL statment and bind parameters.
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":locationId", $locationId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public static function readInventoryLocationsById
            (&$pdo, $invLocationId)
    {
        // Reads name by inventory location Id. 
        $sql = "
          SELECT LocationName Name
          FROM InventoryLocations 
          WHERE InventoryLocationId=:id;
        ";
       
        // Prepare SQL statment and bind parameters.
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":id", $invLocationId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
}