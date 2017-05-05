/**
 * Author:  Steven Chavez
 * Created: May 5, 2017
 * File: db-create-tables.sql
 */

-- Holds the type of product (i.e. 
-- cardboard, equipment, pos).
CREATE TABLE ProductTypes
(
    TypeId int NOT NULL AUTO_INCREMENT,
    TypeName varchar(30) UNIQUE,
    PRIMARY KEY(TypeId)
);

-- Holds location of work site (i.e.
-- warehouse, p.e.c., bin).
CREATE TABLE Locations
(
    LocationId int NOT NULL AUTO_INCREMENT,
    Address varchar (40) NOT NULL,
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
    PRIMARY KEY(InventoryLoactionId),
    CONSTRAINT fk_locationId FOREIGN KEY (LocationId)
        REFERENCES Locations(LocationId),
    CONSTRAINT uc_locationIdandName UNIQUE(LocationId, LocationName)
);

-- Holds the categories of products (i.e. TMD,
-- Weekender, Endcaps, Shelving, ILDs, FEMs)
CREATE TABLE ProductCategories
(
    CategoryId int NOT NULL AUTO_INCREMENT,
    CategoryName int NOT NULL UNIQUE
);


