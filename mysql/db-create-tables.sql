/**
 * Author:  Steven Chavez
 * Created: May 5, 2017
 * File: db-create-tables.sql
 */

-- Describes the type of product (i.e. 
-- cardboard, equipment, pos).
CREATE TABLE ProductType
(
    TypeId int NOT NULL AUTO_INCREMENT,
    TypeName varchar(30) UNIQUE,
    PRIMARY KEY(TypeId)
);

CREATE TABLE Location
(
    LocationId int NOT NULL AUTO_INCREMENT,
    City varchar(30) NOT NULL,
    LocationState varchar(30) NOT NULL,
    Zone varchar(30) NOT NULL,
    Region varchar(30) NOT NULL,
    PRIMARY KEY(LocationId)
);

