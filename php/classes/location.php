<?php
/**
 * PDO enabled container for location authentication
 * Author: Steven
 * Date: 1/28/2017
 * Time: 3:46 PM
 * Version: 1.0
 */

class Location
{
    //###################################
    //  FIELDS
    //###################################
    /**
     * @var id for location
     */
    private $locationId;
    /**
     * @var address of location
     */
    private $address;
    /**
     * @var city of location
     */
    private $city;
    /**
     * @var state of location
     */
    private $state;
    /**
     * @var zip code for location 
     */
    private $zipCode;
    /**
     * @var zone of location
     */
    private $zone;
    /**
     * @var region of location
     */
    private $region;

    //###################################
    //  CONSTRUCTOR
    //###################################

    public function __construct($locationId, $city, $state, $zone, $region)
    {
        $this->setLocationId($locationId);
        $this->setCity($city);
        $this->setState($state);
        $this->setZone($zone);
        $this->setRegion($region);
    }

    //###################################
    //  ACCESSOR METHODS
    //###################################
    /**
     * get id of location
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }
    
    /**
     * get address of location
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * get city of location
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * get state of location
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }
    
    /**
     * get zip code of location
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * get zone of location
     * @return mixed
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * get region of location
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################

    /**
     * set location id for location
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }
    
    /**
     * set address for location
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    /**
     * set city for location
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * set state for location
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
    
    /**
     * set zip code for location
     * @param int $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * set zone for location
     * @param mixed $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    /**
     * set region for location
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
    public static function readLocationCityAndState(&$pdo)
    {
        $sql = "SELECT LocationId, City, LocationState FROM Locations ORDER BY City";

        $results = $pdo->query($sql);

        while($row = $results->fetch(PDO::FETCH_OBJ))
        {
            //add whole object into array
            $data[] = $row;
        }

        return $data;
    }
    
    public static function readCityStateById(&$pdo, $locationId)
    {
        // SQL statement gets name of city and state by id
        $sql = "
            SELECT City, LocationState
            FROM Locations
            WHERE LocationId = :id;
        ";
        
        // Prepare SQL statment and bind parameters.
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":id", $locationId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    /**
     * Reads all locations who have the selected product in its 
     * current inventory.
     *   
     * @param PDO $pdo
     * @param int $id
     * @return OBJ
     */
    public static function readLocationsWithProduct(&$pdo, $id)
    {
        // SQL statement that searches for all locations by product id.
        $sql = " 
            SELECT i.InventoryId, l.City, l.LocationState State, p.ProductName Name, 
                i.Quantity, i.InventoryDate Date
            FROM Locations l
            JOIN InventoryLocations il
            ON l.LocationId=il.LocationId
            JOIN ProductInventories i
            ON i.InventoryLocationId=il.InventoryLocationId
            JOIN Products p
            ON i.ProductId=p.ProductId
            WHERE p.ProductId=:id
            ORDER BY l.LocationState, l.City, i.InventoryDate DESC;
        ";
        
        // Prepare SQL statment and bind parameters.
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}