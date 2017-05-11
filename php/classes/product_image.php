<?php
/**
 * PDO enabled container for product image
 * type authentication
 * 
 * Author: Steven Chavez
 * Date: 5/10/2017
 * Time: 9:30PM
 * Version: 1.0
 * File: product-image.php
 */

class Image
{
    //###################################
    //  FIELDS
    //###################################
    /**
     * @var id for product image. Primary key. 
     */
    private $id;
    /**
     * @var type of image (i.e. jpg, gif, png) 
     */
    private $type;
    /**
     * @var name of image file 
     */
    private $name;
    /**
     * @var url of product image
     */
    private $url;
    
    //###################################
    //  CONSTRUCTOR
    //###################################
    public function _construct($id, $type, $name, $url)
    {
        $this->setId($id);
        $this->setType($type);
        $this->setName($name);
        $this->setURL($url);
    }
    
    //###################################
    //  ACCESSOR METHODS
    //###################################
    /**
     * get id for product image
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * get type of image file
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * get name of image file
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * get URL for product image location
     * @return string
     */
    public function getURL()
    {
        return $this->url;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################
    /**
     * set product image id
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * set image type
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * set image file name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * set URL for image location
     * @param string $url
     */
    public function setURL($url)
    {
        $this->url = $url;
    }        
            
    //###################################
    //  DB CRUD METHODS
    //###################################
}