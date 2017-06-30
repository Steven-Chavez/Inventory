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

-- ProductTypes
INSERT INTO ProductTypes (TypeName)
VALUES ('Equipment'), ('Cardboard'), ('POS');

-- ProductCategories
INSERT INTO ProductCategories (CategoryName, TypeId)
VALUES 
    ('Weekender', 2),
    ('TMD', 2),
    ('FEM', 1),
    ('Stripping', 3);

-- Locations
INSERT INTO Locations (Address, City, LocationState, 
    ZipCode, Zone, Region)
VALUES
    ('22 Anderson lane NW', 'Clovis', 'New Mexico', '87222', 
     'Albuquerque', 'Mountain');

-- InventoryLoactions
INSERT INTO InventoryLocations (LocationId, LocationName)
VALUES
    (1, 'Warehouse (KnockDowns)'),
    (1, 'Warehouse (PickByLights)'),
    (1, 'Trailer A'),
    (1, 'Trailer B'),
    (1, 'Trailer C');

-- Products
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

-- ProductInventories
INSERT INTO ProductInventories (InventoryDate, Quantity, 
    ProductId, InventoryLocationId)
VALUES
    -- Warehouse (KnockDowns)
    ('2017-06-29', 40, 1, 1),
    ('2017-06-29', 55, 2, 1),
    ('2017-06-29', 80, 3, 1),
    ('2017-06-29', 63, 4, 1),
    ('2017-06-29', 73, 5, 1),
    -- Warehouse (PickByLights)
    ('2017-06-29', 23, 6, 2),
    ('2017-06-29', 36, 7, 2),
    ('2017-06-29', 29, 8, 2),
    ('2017-06-29', 41, 9, 2),
    ('2017-06-29', 13, 10, 2),
    -- Trailer A
    ('2017-06-29', 80, 6, 3),
    ('2017-06-29', 23, 7, 3),
    ('2017-06-29', 66, 8, 3),
    ('2017-06-29', 12, 9, 3),
    ('2017-06-29', 75, 10, 3),
    ('2017-06-29', 45, 11, 3),
    ('2017-06-29', 110, 12, 3),
    ('2017-06-29', 211, 13, 3);

    
