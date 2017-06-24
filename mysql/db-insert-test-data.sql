/**
 * Author:  Steven Chavez
 * Created: June 24, 2017
 * File: db-insert-test-data.sql
 * Version: 1.0
 *
 * Inserts test data to for developing purposes.
 * All data is based off real products but not
 * real inventories. 
 */

INSERT INTO Products (ProductName, ProductNumber, Color, 
    NumberPerCase, NumberPerPallet)
VALUES 
    -- Cardboard
    ('18" 4-Shelf Weekender', '20226', 'Blue', 5, 25),
    ('28" 4-Shelf Weekender', '1307', 'Blue', 5, 16),
    ('24" 3-Shelf Weekender', '20185', 'Blue', 5, 17), 
    ('Low Profile TMD', '2563', 'Blue', 4, 15),
    ('5-Shelf TMD', '14211', 'Blue', 2, 20),
    -- Equipment
    ('36" FEM', '1706902', 'Black', 1, NULL),
    ('48" ADA FEM', '2088202', 'Black', 1, NULL),
    ('37" ADA FEM', '2075502', 'Black', 1, NULL),
    ('Spinners', '1954702', 'Black', 1, NULL),
    ('Cookie Countertop', '2026902', 'Black', 1, NULL),
    -- POS *ProductNumbers aren't real*
    ('Stripping', 'RED203', 'Red', 20, NULL),
    ('Stripping', 'BLUE202', 'Blue', 20, NULL),
    ('Extrusions', 'EX222', NULL, 10, NULL);
    

    
