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
    ('22 Anderson lane NW', 'Albuquerque', 'New Mexico', '87222', 
     'Albuquerque', 'Mountain'),
    ('22 Anderson lane NW', 'Clovis', 'New Mexico', '87222', 
     'Albuquerque', 'Mountain'),
    ('22 Anderson lane NW', 'Farmington', 'New Mexico', '87222', 
     'Albuquerque', 'Mountain'),
    ('22 Anderson lane NW', 'Gallup', 'New Mexico', '87222', 
     'Albuquerque', 'Mountain'),
    ;

-- InventoryLoactions
INSERT INTO InventoryLocations (LocationId, LocationName)
VALUES
    (1, 'Warehouse (KnockDowns)'),
    (1, 'Warehouse (PickByLights)'),
    (1, 'Trailer A'),
    (1, 'Trailer B'),
    (1, 'Trailer C'),
    (2, 'Bin (Southside)'),
    (2, 'Bin (Northside)'),
    (3, 'Bin (Southside)'),
    (3, 'Bin (Northside)'),
    (4, 'Bin (Southside)'),
    (4, 'Bin (Northside)');

-- Products
INSERT INTO Products (ProductName, ProductNumber, Color, 
    NumberPerCase, NumberPerPallet, CategoryId)
VALUES 
    -- Cardboard
    ('18" 4-Shelf Weekender', '20226', 'Blue', 5, 25, 1),
    ('28" 4-Shelf Weekender', '1307', 'Blue', 5, 16, 1),
    ('24" 3-Shelf Weekender', '20185', 'Blue', 5, 17, 1), 
    ('Low Profile TMD', '2563', 'Blue', 4, 15, 2),
    ('5-Shelf TMD', '14211', 'Blue', 2, 20, 2),
    -- Equipment
    ('36" FEM', '1706902', 'Black', 1, NULL, 3),
    ('48" ADA FEM', '2088202', 'Black', 1, NULL, 3),
    ('37" ADA FEM', '2075502', 'Black', 1, NULL, 3),
    ('Spinners', '1954702', 'Black', 1, NULL, NULL),
    ('Cookie Countertop', '2026902', 'Black', 1, NULL, NULL),
    -- POS *ProductNumbers aren't real*
    ('Stripping', 'RED203', 'Red', 20, NULL, NULL),
    ('Stripping', 'BLUE202', 'Blue', 20, NULL, NULL),
    ('Extrusions', 'EX222', NULL, 10, NULL, NULL);

-- ProductInventories
INSERT INTO ProductInventories (InventoryDate, Quantity, 
    ProductId, InventoryLocationId)
VALUES
    -- !!!!ALBUQUERQUE, NM!!!!
    -- Warehouse (KnockDowns)
    ('2017-06-29', 40, 1, 1),
    ('2017-06-29', 55, 2, 1),
    ('2017-06-29', 80, 3, 1),
    ('2017-06-29', 63, 4, 1),
    ('2017-06-29', 73, 5, 1),
    ('2017-05-13', 5, 1, 1),
    ('2017-05-13', 11, 2, 1),
    ('2017-05-13', 20, 3, 1),
    ('2017-05-13', 17, 4, 1),
    ('2017-05-13', 6, 5, 1),
    -- Warehouse (PickByLights)
    ('2017-06-29', 23, 6, 2),
    ('2017-06-29', 36, 7, 2),
    ('2017-06-29', 29, 8, 2),
    ('2017-06-29', 41, 9, 2),
    ('2017-06-29', 13, 10, 2),
    ('2017-05-17', 5, 6, 2),
    ('2017-05-17', 23, 7, 2),
    ('2017-05-17', 17, 8, 2),
    ('2017-05-17', 2, 9, 2),
    ('2017-05-17', 4, 10, 2),
    -- Trailer A
    ('2017-06-29', 80, 6, 3),
    ('2017-06-29', 23, 7, 3),
    ('2017-06-29', 66, 8, 3),
    ('2017-06-29', 12, 9, 3),
    ('2017-06-29', 75, 10, 3),
    ('2017-06-29', 45, 11, 3),
    ('2017-06-29', 110, 12, 3),
    ('2017-06-29', 211, 13, 3),
    -- Trailer B
    ('2017-06-29', 211, 12, 4),
    ('2017-06-29', 211, 13, 4),
    -- Trailer C
    ('2017-06-29', 211, 12, 5),
    ('2017-06-29', 211, 13, 5),
    

    -- !!!!CLOVIS, NM!!!!
    -- Bin(Southside)
    ('2017-08-12', 27, 1, 6),
    ('2017-08-12', 63, 3, 6),
    ('2017-08-12', 54, 4, 6),
    ('2017-08-12', 77, 5, 6),
    ('2017-08-12', 11, 8, 6),
    ('2017-08-12', 45, 10, 6),
    ('2017-08-12', 33, 12, 6),
    -- Bin(Northside)
    ('2017-08-12', 22, 2, 7),
    ('2017-08-12', 64, 6, 7),
    ('2017-08-12', 43, 7, 7),
    ('2017-08-12', 74, 9, 7),

    -- !!!!FARMINGTON NM!!!
    -- Bin(Southside)
    ('2017-08-12', 33, 1, 8),
    ('2017-08-12', 73, 3,8),
    ('2017-08-12', 54, 4, 8),
    ('2017-08-12', 34, 5, 8),
    ('2017-08-12', 55, 8, 8),
    ('2017-08-12', 74, 10, 8),
    ('2017-08-12', 55, 12, 8),
    -- Bin(Northside)
    ('2017-08-12', 21, 2, 9),
    ('2017-08-12', 11, 6, 9),
    ('2017-08-12', 33, 7, 9),
    ('2017-08-12', 31, 9, 9),

    -- !!!!GALLUP NM!!!!
    -- Bin (Southside)
    ('2017-08-12', 31, 1, 10),
    ('2017-08-12', 31, 2, 10),
    ('2017-08-12', 31, 3, 10),
    ('2017-08-12', 31, 5, 10),
    -- Bin (Northside)
    ('2017-08-12', 31, 8, 11),
    ('2017-08-12', 31, 9, 11);

    
