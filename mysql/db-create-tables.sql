/**
 * Author:  Steven Chavez
 * Created: May 5, 2017
 * File: db-create-tables.sql
 */

-- Describes the type of product (i.e. 
-- cardboard, equipment, pos).
CREATE TABLE ProductTypes
(
    TypeId int NOT NULL AUTO_INCREMENT,
    TypeName varchar(30) UNIQUE,
    PRIMARY KEY(TypeId)
);

-- Describes location of work site (i.e.
-- warehouse, p.e.c., bin)
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

);

