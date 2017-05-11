<?php
/**
 * PDO enabled container for product category authentication
 * 
 * Author: Steven
 * Date: 5/9/2017
 * Time: 10:09 PM
 * Version: 1.0
 * File: product-category.php
 */

class Category
{
    //###################################
    //  FIELDS
    //###################################
    /**
     * @var id for product category 
     */
    private $id;
    /**
     *@var name of product category
     */
    private $name;
    /**
     * @var id for product type
     */
    private $typeId;

    //###################################
    //  CONSTRUCTOR
    //###################################
    public function _construct($id, $name, $typeId)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setTypeId($typeId);
    }

    //###################################
    //  ACCESSOR METHODS
    //###################################
    /**
     * get id for category
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * get name of product category
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * get type id of product
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    //###################################
    //  MUTATOR METHODS
    //###################################
    /**
     * set category id
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * set name for product category
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * set type id for product
     * @param type $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
  
}