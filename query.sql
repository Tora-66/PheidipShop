USE `dbpheidip`;

SELECT * FROM `tbOrder_Master`;
SELECT * FROM `tbInventory`;
SELECT * FROM `tbOrder_Details`;
SELECT * FROM `tbProduct`;

INSERT INTO `tbInventory` VALUES 
('001', 'M', 0),
('001', 'XL', 0),
('003', 'M', 0),
('004', 'L', 0),
('005', 'S', 0);

UPDATE `tbInventory`
SET `Quantity` = `Quantity` - 1
WHERE `ProductID` = ;

INSERT INTO `tbOrder_Details`(InventoryID, Quantity) VALUES
()
; 
