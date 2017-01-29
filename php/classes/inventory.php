<?php
/**
 * PDO enabled container for inventory authentication
 * Author: Steven Chavez
 * Date: 1/28/2017
 * Time: 6:44 PM
 * Version: 1.0
 */

class Inventory
{
    //###################################
    //  FIELDS
    //###################################
    private $inventoryId;
    private $productId;
    private $locationId;
    private $date;
    private $quantity;
    private $localLocation;

    //###################################
    //  ACCESSOR METHODS
    //###################################
    /**
     * @return mixed
     */
    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getLocalLocation()
    {
        return $this->localLocation;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################

    /**
     * @param mixed $inventoryId
     */
    public function setInventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @param mixed $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $localLocation
     */
    public function setLocalLocation($localLocation)
    {
        $this->localLocation = $localLocation;
    }
}