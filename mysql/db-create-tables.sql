/**
 * Author:  Steven Chavez
 * Created: May 5, 2017
 * File: db-create-tables.sql
 */

CREATE TABLE ProductType
(
    TypeId int NOT NULL AUTO_INCREMENT,
    TypeName varchar(30) UNIQUE,
    PRIMARY KEY(TypeId)
);

