<?php
/**
 * PDO enabled container for inventory location 
 * type authentication
 * 
 * Author: Steven
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

    //###################################
    //  CONSTRUCTOR
    //###################################
    public function _construct()
    {
        
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

    //###################################
    //  MUTATOR METHODS
    //###################################


    //###################################
    //  DB CRUD METHODS
    //###################################
    
}