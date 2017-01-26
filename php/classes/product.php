<?php
/**
 * PDO enabled container for product authentication
 *
 * Author: Steven
 * Date: 1/25/2017
 * Time: 6:51 PM
 * Version: 1.0
 */

class Product
{
    /**
     * @var product id for Product table; primary key
     */
    private $productID;
    /**
     * @var name of product
     */
    private $prodcutName;
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
     * @var boolean identifying if product is new or not
     */
    private $brandNew;

    /**
     * @var type id identifies product type; foreign key
     */
    private $typeID;

    /**
     * Product constructor.
     */
    public function __construct()
    {
    }


}
?>