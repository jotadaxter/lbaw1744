PRAGMA foreign_keys = ON;

.headers on
.mode column

--deletes
DELETE FROM Users;
DELETE FROM Sellers;
DELETE FROM Buyers;
DELETE FROM Products;
DELETE FROM Discounts; -- Promotions?
DELETE FROM Purchases;
DELETE FROM Reviews;
--DELETE FROM Payments;
DELETE FROM Wishlists;
-- (R12) DELETE FROM ;
-- DELETE FROM Product_Tags;
-- (R14)DELETE FROM ;
-- DELETE FROM Purchase_Products;
-- DELETE FROM Payment_Purchases;
-- DELETE FROM Review_Products;
-- DELETE FROM Buys;
DELETE FROM Images;
DELETE FROM ProductImages;
DELETE FROM Tags;
DELETE FROM SerialKeys;
