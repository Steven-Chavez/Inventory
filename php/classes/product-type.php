<?php
/**
 * PDO enabled container for product type authentication
 * 
 * Author: Steven
 * Date: 1/26/2017
 * Time: 1:28 PM
 * Version: 1.0
 * File: product-type.php
 */

class ProductType
{
    //###################################
    //  FIELDS
    //###################################
    /**
     * @var id for product type
     */
    private $typeId;
    /**
     * @var name of product type
     */
    private $typeName;

    //###################################
    //  CONSTRUCTOR
    //###################################

    public function __construct($typeId, $typeName)
    {
        $this->setTypeId($typeId);
        $this->setTypeName($typeName);
    }

    //###################################
    //  ACCESSOR METHODS
    //###################################

    /**
     * get id of product type
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * get name of product type
     * @return mixed
     */
    public function getTypeName()
    {
        return $this->typeName;
    }


    //###################################
    //  MUTATOR METHODS
    //###################################

    /**
     * set product type id
     * @param mixed $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    /**
     * set product type name
     * @param mixed $typeName
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;
    }

    //###################################
    //  DB CRUD METHODS
    //###################################
    public static function readTypeNames(&$pdo)
    {
        $SQL = "SELECT TypeName FROM ProductType";

        $results = $pdo->query($SQL);

        while($row = $results->fetch(PDO::FETCH_OBJ))
        {
            $data[] = $row->TypeName;
        }

        return $data;
    }

    public function insert(&$pdo)
    {
        $sql = "
            INSERT INTO ProductTypes(TypeName)
            VALUES(:pType)
            ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":pType", $this->typeName, PDO::PARAM_STR);
        $stmt->execute();
    }
}