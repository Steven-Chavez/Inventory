/**
 * Author:  Steven Chavez
 * Created: May 5, 2017
 * File: db-create-tables.sql
 * Version: 2.0
 */

-- Holds the type of product (i.e. 
-- cardboard, equipment, pos).
CREATE TABLE ProductTypes
(
    TypeId int NOT NULL AUTO_INCREMENT,
    TypeName varchar(30) NOT NULL UNIQUE,
    PRIMARY KEY(TypeId)
);

-- Holds the location of a work site (i.e.
-- warehouse, p.e.c., bin).
CREATE TABLE Locations
(
    LocationId int NOT NULL AUTO_INCREMENT,
    Address varchar (50) NOT NULL,
    City varchar(30) NOT NULL,
    LocationState varchar(30) NOT NULL,
    ZipCode varchar(10) NOT NULL,
    Zone varchar(30) NOT NULL,
    Region varchar(30) NOT NULL,
    PRIMARY KEY(LocationId)
);

-- Holds the location of where the inventory
-- was taken (i.e. warehouse, trailer, pick-by-lights).
CREATE TABLE InventoryLocations
(
    InventoryLocationId int NOT NULL AUTO_INCREMENT,
    LocationId int NOT NULL,
    LocationName varchar(30) NOT NULL,
    PRIMARY KEY(InventoryLocationId),
    CONSTRAINT fk_locationId FOREIGN KEY (LocationId)
        REFERENCES Locations(LocationId),
    CONSTRAINT uc_locationIdandName UNIQUE (LocationId, LocationName)
);

-- Holds the categories of products (i.e. TMD,
-- Weekender, Endcaps, Shelving, ILDs, FEMs)
CREATE TABLE ProductCategories
(
    CategoryId int NOT NULL AUTO_INCREMENT,
    CategoryName int NOT NULL UNIQUE,
    TypeId int NOT NULL,
    PRIMARY KEY(CategoryId),
    CONSTRAINT fk_productTypes FOREIGN KEY (TypeId)
        REFERENCES ProductTypes(TypeId)
);

-- Holds the information of specific products (i.e.
-- (Low Profile TMD, 28" Weekender, Mini-Weekender)
CREATE TABLE Products
(
    ProductId int NOT NULL AUTO_INCREMENT,
    ProductName varchar(50) NOT NULL,
    ProductNumber varchar(30) NOT NULL,
    Color varchar(30),
    NumberPerCase int NOT NULL,
    NumberPerPallet int NOT NULL,
    CategoryId int NOT NULL,
    PRIMARY KEY(ProductId),
    CONSTRAINT fk_products_categoryId FOREIGN KEY(CategoryId)
        REFERENCES ProductCategories(CategoryId)
);

-- Holds the different inventories of products in
-- different locations
CREATE TABLE ProductInventories
(
    InventoryId int NOT NULL AUTO_INCREMENT,
    InventoryDate date NOT NULL,
    Quantity int NOT NULL,
    ProductId int NOT NULL,
    InventoryLocationId int NOT NULL,
    PRIMARY KEY(InventoryId),
    CONSTRAINT fk_inventories_productId FOREIGN KEY(ProductId)
        REFERENCES Products(ProductId),
    CONSTRAINT fk_inventories_locationId FOREIGN KEY(InventoryLocationId)
        REFERENCES InventoryLocations(InventoryLocationId),
    CONSTRAINT uc_productInventory 
        UNIQUE(ProductId, InventoryLocationId,InventoryDate)
    
);


