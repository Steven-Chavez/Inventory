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

    //###################################
    //  ACCESSOR METHODS
    //###################################

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