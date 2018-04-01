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

-- Users (nome, morada, idPais) VALUES ('Controlar', 'Alfena', 1);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(100, 'janedoe1', 'cheekybreeky', 'jane eleanor doer', 969420666, 'janedoe@gmail.com', '1988/11/18', '2018/3/20', 'Active', false, 'janeavatar.jpg', 666420666);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(101, 'jenlong', 'oblivion', 'jenny long', 911999333, 'jenny.long84@example.com', '1973/7/10', '2018/2/20', 'Active', false, 'jenavatar.jpg', 666420777);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(102, 'everettdotnet', 'morrowind', 'everett adams', 969420444, 'everett.adams60@example.com', '1980/3/8', '2018/1/10', 'Active', false, 'eveavatar.jpg', 666420888);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(103, 'zdaroviaqueen', 'zdarovia', 'regina duncan', 969420555, 'regina.duncan44@example.com', '1990/1/1', '2018/3/11', 'Active', false, 'regavatar.jpg', 666420999);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(104, 'kentron', 'notoriousbig', 'ken gonzalez', 969420777, 'ken.gonzalez84@example.com', '1994/4/4', '2018/1/18', 'Active', false, 'tedavatar.jpg', 666421000);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(105, 'teddyboy', 'yeezytaughtme', 'ted mitchell', 969420888, 'ted.mitchell70@example.com', '1988/11/18', '2018/3/20', 'Active', false, 'janeavatar.jpg', 666421111);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(106, 'nottheactor', 'hoffhoff', 'dustin hoffman', 969420999, 'dustin.hoffman16@example.com', '1987/9/19', '2018/6/21', 'Active', false, 'dustavatar.jpg', 666421222);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(107, 'desugurippu', 'noided', 'michael arnold', 969420111, 'michael.arnold30@example.com', '1984/8/7', '2018/3/22', 'Active', false, 'micavatar.jpg', 666421333);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(108, 'normac', 'cardibandrum', 'norma cooper', 969420222, 'norma.cooper92@example.com', '1999/12/28', '2018/1/4', 'Active', false, 'normavatar.jpg', 666421444);
INSERT INTO Users(user_id, username, password, fullname, email, phone_number, birth_date, admission_date, userstate, admin, img, nif) VALUES(109, 'lilnina', 'groovey', 'nina sutton', 969420333, 'nina.sutton76@example.com', '1997/10/9', '2018/2/3', 'Active', false, 'ninavatar.jpg', 666421555);

-- Buyers (user_id)
INSERT INTO Buyers(user_id) VALUES (100);
INSERT INTO Buyers(user_id) VALUES (101);
INSERT INTO Buyers(user_id) VALUES (102);
INSERT INTO Buyers(user_id) VALUES (103);
INSERT INTO Buyers(user_id) VALUES (104);

-- Sellers (user_id, professional_email, professional_name, professional_phone)
INSERT INTO Sellers (user_id, professional_email, professional_name, professional_phone) VALUES (105, 'ableton@gmail.com', 'ableton', 912345678);
INSERT INTO Sellers (user_id, professional_email, professional_name, professional_phone) VALUES (106, 'adobe@gmail.com', 'adobe', 913456789);
INSERT INTO Sellers (user_id, professional_email, professional_name, professional_phone) VALUES (107, 'microsoft@gmail.com', 'microsoft', 912543876);
INSERT INTO Sellers (user_id, professional_email, professional_name, professional_phone) VALUES (108, 'sony@gmail.com', 'sony', 913654987);
INSERT INTO Sellers (user_id, professional_email, professional_name, professional_phone) VALUES (109, 'blender@gmail.com', 'blender', 919876543);

-- Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name)
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (200, 105, 'daw for live mixing and production', '2015/10/20', 'wml', 599, 'ableton9.jpg', 'ableton 9 live suite');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (201, 106, 'image editing software', '2016/2/14', 'wml', 599, 'photoshop.jpg', 'adobe photoshop');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (202, 107, 'programming ide', '2018/3/12', 'w', 199, 'visualstudio.jpg', 'visual studio 2018');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (203, 108, 'video editing software', '2014/1/22', 'wm', 299, 'sonyvegas.jpg', 'sony vegas pro');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (204, 109, '3d rendering and editing software', '2013/10/12', 'wml', 0, 'blender.jpg', 'blender');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (205, 105, 'synthetizer plug in for ableton', '2017/11/21', 'wml', 29, 'massive.jpg', 'ableton massive plugin');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (206, 106, 'vector graphic design software', '2016/4/1', 'wml', 99, 'ilustrator.jpg', 'adobe ilustrator');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (207, 107, 'programming text editor', '2017/11/10', 'w', 0, 'visualcode.jpg', 'microsoft visual code');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (208, 108, 'digital audio editing suite software', '2002/7/12', 'wm', 199, 'soundforge.jpg', 'sony sound forge');
INSERT INTO Products (product_id, seller_id, description, release_date, operating_system, price, logo_path, name) VALUES (209, 109, 'dynamic mixing device', '2018/10/9', 'wml', 99, 'channelblender.jpg', 'channel blender');

-- Product Images (product_id, img_path)
INSERT INTO ProductImages(product_id, img_path) VALUES (200, 'abletonimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (201, 'photoshopimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (202, 'visualstudioimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (203, 'sonyvegasimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (204, 'blenderimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (205, 'massiveimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (206, 'ilustratorimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (207, 'visualcodeimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (208, 'soundforgeimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (209, 'channelblenderimg1.jpg');

-- Tags (product_id, tag_name)
--INSERT INTO Tags(poduct_id, tag_name) VALUES (200, 'daw');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (201, 'image');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (202, 'programming');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (203, 'video');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (204, '3d');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (205, 'audio');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (206, 'design');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (207, 'text');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (208, 'audio');
--INSERT INTO Tags(poduct_id, tag_name) VALUES (209, '3d');

-- Reviews (purchase_id, rating, comment)
--INSERT INTO Reviews(purchase_id, rating, comment) VALUES ();
