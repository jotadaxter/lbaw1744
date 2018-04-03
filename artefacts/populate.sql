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
INSERT INTO ProductImages(product_id, img_path) VALUES (300, 'abletonimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (301, 'photoshopimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (302, 'visualstudioimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (303, 'sonyvegasimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (304, 'blenderimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (305, 'massiveimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (306, 'ilustratorimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (307, 'visualcodeimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (308, 'soundforgeimg1.jpg');
INSERT INTO ProductImages(product_id, img_path) VALUES (309, 'channelblenderimg1.jpg');

-- Tags (product_id, tag_name)
INSERT INTO Tags(poduct_id, tag_name) VALUES (400, 'daw');
INSERT INTO Tags(poduct_id, tag_name) VALUES (401, 'image');
INSERT INTO Tags(poduct_id, tag_name) VALUES (402, 'programming');
INSERT INTO Tags(poduct_id, tag_name) VALUES (403, 'video');
INSERT INTO Tags(poduct_id, tag_name) VALUES (404, '3d');
INSERT INTO Tags(poduct_id, tag_name) VALUES (405, 'audio');
INSERT INTO Tags(poduct_id, tag_name) VALUES (406, 'design');
INSERT INTO Tags(poduct_id, tag_name) VALUES (407, 'text');
INSERT INTO Tags(poduct_id, tag_name) VALUES (408, 'audio');
INSERT INTO Tags(poduct_id, tag_name) VALUES (409, '3d');

-- Reviews (sk_id, rating, review_date, comment)
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (500, 4, '2018/3/1', 'very good product although a tad expensive');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (501, 5, '2017/4/12', 'i am amazed at this product it is very nice');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (502, 5, '2018/10/25', 'this is an incredible piece of software');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (503, 4, '2017/6/15', 'the product fulfills its purpose with precision');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (504, 3, '2018/2/5', 'hey thats pretty good');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (505, 5, '2018/8/14', 'i am astonished at how efficient this product is');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (506, 2, '2018/4/22', 'way too expensive for the amount of features it comes with');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (507, 4, '2017/10/30', 'way too cheap for the amount of features it comes with');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (508, 1, '2016/7/6', 'absolutely atrocious, barely works, cant even install it');
INSERT INTO Reviews(sk_id, rating, review_date, comment) VALUES (509, 3, '2018/12/14', 'its nice but there are way better options out there');

-- Discounts (product_id, discounted_rice, begin_date, end_date)
INSERT INTO Discounts(product_id, discounted_price, begin_date, end_date) VALUES (200, 20, '2018/5/10', '2018/5/20');
INSERT INTO Discounts(product_id, discounted_price, begin_date, end_date) VALUES (201, 20, '2018/5/10', '2018/5/20');
INSERT INTO Discounts(product_id, discounted_price, begin_date, end_date) VALUES (202, 30, '2018/5/10', '2018/5/20');
INSERT INTO Discounts(product_id, discounted_price, begin_date, end_date) VALUES (203, 20, '2018/12/1', '2019/1/4'),;
INSERT INTO Discounts(product_id, discounted_price, begin_date, end_date) VALUES (204, 15, '2018/4/1', '2018/4/30');

-- SerialKeys (sk_id, owner_id, product_id, code)
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (700, 105, 200, '1J6B5JHG7I');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (701, 106, 201, '0FIAJ5N6B3');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (702, 107, 202, '09FUHRB5N6');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (703, 108, 203, 'S0HNS4K6HS');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (704, 109, 204, 'OFCJAGHI54');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (705, 105, 205, '0SAIDUFRKF');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (706, 106, 206, 'SGHUDIFOG3');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (707, 107, 207, '5URJEDKHA4');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (708, 108, 208, '38HUEDWXJH');
INSERT INTO SerialKeys(sk_id, owner_id, product_id, code) VALUES (709, 109, 209, 'IODIGHOI2N');


-- Purchases (purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details)
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (800, 579, 100, 700, '2018/4/21', 'Credit Card', 'Purchase successful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (801, 579, 101, 701, '2018/6/12', 'Credit Card', 'Purchase successful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (802, 169, 102, 702, '2018/5/2', 'PayPal', 'Minor setbacks contacting seller');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (803, 279, 103, 703, '2018/6/23', 'Banking Transfer', 'Purchase successful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (804, 14, 104, 704, '2018/3/31', 'Banking Transfer', 'Minor setbacks contacting seller');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (805, 29, 100, 705, '2018/1/26', 'Credit Card', 'Purchase sucessful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (806, 99, 101, 706, '2018/8/1', 'PayPal', 'Purchase successful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (807, 579, 102, 707, '2018/11/4', 'PayPal', 'Purchase successful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (808, 199, 103, 708, '2018/3/10', 'PayPal', 'Purchase successful');
INSERT INTO Purchases(purchase_id, final_price, buyer_id, sk_id, paid_date, paymentmethod, details) VALUES (809, 99, 104, 709, '2018/9/2', 'Credit Card', 'Purchase successful');

-- Wishlists (user_id, product_id)
INSERT INTO Wishlists(user_id, product_id) VALUES (100, 209);
INSERT INTO Wishlists(user_id, product_id) VALUES (101, 208);
INSERT INTO Wishlists(user_id, product_id) VALUES (102, 207);
INSERT INTO Wishlists(user_id, product_id) VALUES (103, 206);
INSERT INTO Wishlists(user_id, product_id) VALUES (104, 205);
INSERT INTO Wishlists(user_id, product_id) VALUES (105, 204);
INSERT INTO Wishlists(user_id, product_id) VALUES (106, 203);
INSERT INTO Wishlists(user_id, product_id) VALUES (107, 202);
INSERT INTO Wishlists(user_id, product_id) VALUES (108, 201);
INSERT INTO Wishlists(user_id, product_id) VALUES (109, 200);

-- PurchasedProducts (purchase_id, product_id)
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (800, 200);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (801, 201);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (802, 202);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (803, 203);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (804, 204);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (805, 205);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (806, 206);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (807, 200);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (808, 208);
INSERT INTO PurchasedProducts(purchase_id, product_id) VALUES (809, 206);
