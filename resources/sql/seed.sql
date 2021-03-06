DROP TYPE IF EXISTS "userstate" CASCADE;
DROP TABLE IF EXISTS "Users" CASCADE;
DROP TABLE IF EXISTS "Sellers" CASCADE;
DROP TABLE IF EXISTS "Products" CASCADE;
DROP TYPE IF EXISTS "paymentmethod" CASCADE;
DROP TYPE IF EXISTS "invoicestate" CASCADE;
DROP TABLE IF EXISTS "SerialKeys" CASCADE;
DROP TABLE IF EXISTS "Discounts" CASCADE;
DROP TABLE IF EXISTS "Purchases" CASCADE;
DROP TABLE IF EXISTS "Reviews" CASCADE;
DROP TABLE IF EXISTS "Tags" CASCADE;
DROP TABLE IF EXISTS "PurchasedKeys" CASCADE;
DROP TABLE IF EXISTS "Wishlists" CASCADE;
DROP TABLE IF EXISTS "ProductImages" CASCADE;
DROP TABLE IF EXISTS "Invoices" CASCADE;


CREATE TYPE paymentmethod AS ENUM (
    'Credit Card',
    'PayPal',
    'Banking Transfer'
);


CREATE TYPE invoicestate AS ENUM (
    'Payment received',
    'Awaiting Payment',
    'Canceled'
);


CREATE TYPE userstate AS ENUM (
    'Active',
    'Inactive',
    'Blocked',
    'Banned',
	'Closed'
);


	-- Tables

CREATE TABLE "Discounts" (
    product_id integer NOT NULL,
    discounted_price double precision NOT NULL,
    begin_date timestamp with time zone DEFAULT now() NOT NULL,
    end_date timestamp with time zone NOT NULL,
    CONSTRAINT "Discounts_check" CHECK (end_date > begin_date),
    CONSTRAINT "Discounts_discounted_price_check" CHECK (discounted_price >= 0.)
);


CREATE TABLE "ProductImages" (
    product_id integer NOT NULL,
    img_path text NOT NULL
);


CREATE TABLE "Products" (
    product_id integer NOT NULL,
    user_id integer NOT NULL,
    description text NOT NULL,
    release_date timestamp with time zone NOT NULL,
    operating_system text NOT NULL,
    price double precision NOT NULL,
    logo_path text NOT NULL,
    name text NOT NULL,
    hidden boolean NOT NULL,
    developer text NOT NULL,
    publisher text NOT NULL,
    CONSTRAINT "Products_price_check" CHECK (price >= 0.)
);


CREATE TABLE "Purchases" (
    purchase_id integer NOT NULL,
    final_price double precision NOT NULL,
    user_id integer NOT NULL,
    paid_date timestamp with time zone DEFAULT now() NOT NULL,
    payment_method paymentmethod,
    details text,
    CONSTRAINT "Payments_check" CHECK ((final_price > 0. AND payment_method <> NULL) OR (final_price = 0. AND payment_method = NULL))
);


CREATE TABLE "Reviews" (
	sk_id integer NOT NULL,
    rating integer NOT NULL,
    review_date timestamp with time zone DEFAULT now() NOT NULL,
    "comment" text
);


CREATE TABLE "Sellers" (
    user_id integer NOT NULL,
    professional_email text NOT NULL,
    professional_name text NOT NULL,
    professional_phone integer NOT NULL
);


CREATE TABLE "SerialKeys" (
	sk_id integer NOT NULL,
    assignment_id integer,
    product_id integer NOT NULL,
    code text NOT NULL
);


CREATE TABLE "Tags" (
    product_id integer NOT NULL,
    tag_name text NOT NULL
);


CREATE TABLE "Users" (
    user_id integer NOT NULL,
    username text NOT NULL,
    password text NOT NULL,
    fullname text,
    email text NOT NULL,
    phone_number integer,
    birth_date timestamp with time zone NOT NULL,
    admission_date timestamp with time zone DEFAULT now() NOT NULL,
    "state" userstate DEFAULT 'Active' NOT NULL,
    "admin" boolean DEFAULT false NOT NULL,
    img text,
    nif integer,
    remember_token text,
    confirmation_code text
);


CREATE TABLE "Wishlists" (
    user_id integer NOT NULL,
    product_id integer NOT NULL
);

CREATE TABLE "PurchasedKeys" (
    sk_id integer NOT NULL,
    purchase_id integer NOT NULL,
    price double precision NOT NULL
);

CREATE TABLE "Invoices" (
    invoice_id integer NOT NULL,
    final_price double precision NOT NULL,
    user_id integer NOT NULL,
    emission_date timestamp with time zone DEFAULT now() NOT NULL,
    payment_method paymentmethod,
    state invoicestate,
    CONSTRAINT "Payments_check" CHECK ((final_price > 0. AND payment_method <> NULL) OR (final_price = 0. AND payment_method = NULL))
);



	-- Primary Keys and Uniques


ALTER TABLE ONLY "Discounts"
    ADD CONSTRAINT "Discounts_pkey" PRIMARY KEY (product_id);


ALTER TABLE ONLY "ProductImages"
    ADD CONSTRAINT "ProductImages_pkey" PRIMARY KEY (product_id, img_path);


ALTER TABLE ONLY "Products"
    ADD CONSTRAINT "Products_name_key" UNIQUE (name);


ALTER TABLE ONLY "Products"
    ADD CONSTRAINT "Products_pkey" PRIMARY KEY (product_id);


ALTER TABLE ONLY "Purchases"
    ADD CONSTRAINT "Purchases_pkey" PRIMARY KEY (purchase_id);


ALTER TABLE ONLY "Reviews"
    ADD CONSTRAINT "Reviews_pkey" PRIMARY KEY (sk_id);

ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_pkey" PRIMARY KEY (user_id);


ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_professional_email_key" UNIQUE (professional_email);


ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_user_id_key" UNIQUE (user_id);


ALTER TABLE ONLY "SerialKeys"
    ADD CONSTRAINT "SerialKeys_pkey" PRIMARY KEY (sk_id);


ALTER TABLE ONLY "Tags"
    ADD CONSTRAINT "Tags_pkey" PRIMARY KEY (product_id, tag_name);


ALTER TABLE ONLY "Users"
    ADD CONSTRAINT "Users_email_key" UNIQUE (email);


ALTER TABLE ONLY "Users"
    ADD CONSTRAINT "Users_pkey" PRIMARY KEY (user_id);


ALTER TABLE ONLY "Users"
    ADD CONSTRAINT "Users_username_key" UNIQUE (username);


ALTER TABLE ONLY "Wishlists"
    ADD CONSTRAINT "Wishlists_pkey" PRIMARY KEY (user_id, product_id);


ALTER TABLE ONLY "PurchasedKeys"
    ADD CONSTRAINT "PurchasedKeys_pkey" PRIMARY KEY (sk_id, purchase_id);



	-- Foreign Keys


ALTER TABLE ONLY "ProductImages"
    ADD CONSTRAINT "ProductImages_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Products"
    ADD CONSTRAINT "Products_user_id_fkey" FOREIGN KEY (user_id) REFERENCES "Sellers"(user_id) ON UPDATE CASCADE;
	

ALTER TABLE ONLY "Purchases"
    ADD CONSTRAINT "Purchases_user_id_fkey" FOREIGN KEY (user_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Reviews"
    ADD CONSTRAINT "Reviews_purchase_id_fkey" FOREIGN KEY (sk_id) REFERENCES "SerialKeys"(sk_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_user_id_fkey" FOREIGN KEY (user_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "SerialKeys"
    ADD CONSTRAINT "SerialKeys_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Tags"
    ADD CONSTRAINT "Tags_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Wishlists"
    ADD CONSTRAINT "Wishlists_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Wishlists"
    ADD CONSTRAINT "Wishlists_user_id_fkey" FOREIGN KEY (user_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "PurchasedKeys"
    ADD CONSTRAINT "PurchasedKeys_sk_id_fkey" FOREIGN KEY (sk_id) REFERENCES "SerialKeys"(sk_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "PurchasedKeys"
    ADD CONSTRAINT "PurchasedKeys_purchase_id_fkey" FOREIGN KEY (purchase_id) REFERENCES "Purchases"(purchase_id) ON UPDATE CASCADE;



	-- Sequences

DROP SEQUENCE IF EXISTS "SerialGenerator" CASCADE;

CREATE SEQUENCE "SerialGenerator";

ALTER TABLE ONLY "Products"
	ALTER COLUMN product_id SET DEFAULT nextval('"SerialGenerator"'::regclass);
	
ALTER TABLE ONLY "Users"
	ALTER COLUMN user_id SET DEFAULT nextval('"SerialGenerator"'::regclass);
	
ALTER TABLE ONLY "SerialKeys"
	ALTER COLUMN sk_id SET DEFAULT nextval('"SerialGenerator"'::regclass);
	
ALTER TABLE ONLY "Purchases"
	ALTER COLUMN purchase_id SET DEFAULT nextval('"SerialGenerator"'::regclass);
	
ALTER TABLE ONLY "Invoices"
	ALTER COLUMN invoice_id SET DEFAULT nextval('"SerialGenerator"'::regclass);




--deletes
DELETE FROM "Users";
DELETE FROM "Sellers";
DELETE FROM "Products";
DELETE FROM "Discounts";
DELETE FROM "Purchases";
DELETE FROM "Reviews";
DELETE FROM "Wishlists";
DELETE FROM "ProductImages";
DELETE FROM "Tags";
DELETE FROM "SerialKeys";
DELETE FROM "Invoices";

-- Users (user_id, username, password, fullname, email, phone_number, birth_date, admission_date, Userstate, admin, img, nif)
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 100, 'janedoe1', '$2y$10$KpcYrPtUzXQTG65mlBEfV.HKlDn7WDIN8BsPDZBgsGOnb4rbh49RS', 'jane eleanor doer', 969420666, 'janedoe@gmail.com', '1988/11/18', '2018/3/20', 'Active', true, 'janeavatar.jpg', 666420666);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 101, 'jenlong', '$2y$10$S52KODGbYIUIEsQlkjYjreMRIJq24jDFV/H4U9i4gLuaONRhPYx9G', 'jenny long', 911999333, 'jenny.long84@example.com', '1973/7/10', '2018/2/20', 'Active', true, 'jenavatar.jpg', 666420777);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 102, 'everettdotnet', '$2y$10$sjD2aP0uBcLn17MNG2lqyOZl3SEgf89HoEMVJgLJqaLIkn/rkvZci', 'everett adams', 969420444, 'everett.adams60@example.com', '1980/3/8', '2018/1/10', 'Active', false, 'eveavatar.jpg', 666420888);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 103, 'zdaroviaqueen', '$2y$10$jVJye8bH/JS3FE25/6x8xOx8cdgcorH0VNEccmiBlPnZWUVt21m62', 'regina duncan', 969420555, 'regina.duncan44@example.com', '1990/1/1', '2018/3/11', 'Active', false, 'default.png', 666420999);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 104, 'kentron', '$2y$10$FOR8bKgMT2qGQOUaXruwquS2I6kjqN//IxRq67se4D.Xhdw05QCrK', 'ken gonzalez', 969420777, 'ken.gonzalez84@example.com', '1994/4/4', '2018/1/18', 'Active', false, 'default.png', 666421000);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 105, 'teddyboy', '$2y$10$1CMTjr7xwoPKt.mX7xQxde8U3GSKlnaV0gbpzgmKe0n5vz291Mltq', 'ted mitchell', 969420888, 'ted.mitchell70@example.com', '1988/11/18', '2018/3/20', 'Active', false, 'default.png', 666421111);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 106, 'nottheactor', '$2y$10$S8jVUU90WS/lEEDvJCsR7u0wbS/FBd5ctIDLjbSIFv.H36E5.RYgO', 'dustin hoffman', 969420999, 'dustin.hoffman16@example.com', '1987/9/19', '2018/6/21', 'Active', false, 'default.png', 666421222);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 107, 'desugurippu', '$2y$10$6V1/GCBl.zOggF6zd17TCObHfLVxlPXMwQPeRcnXdmnl3m88ZMjyO', 'michael arnold', 969420111, 'michael.arnold30@example.com', '1984/8/7', '2018/3/22', 'Active', false, 'default.png', 666421333);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 108, 'normac', '$2y$10$0HrAIJwLU1JPiZ69HjUwIO5PTzWXroz15V5YP7H8msR6644fT6gGK', 'norma cooper', 969420222, 'norma.cooper92@example.com', '1999/12/28', '2018/1/4', 'Active', false, 'default.png', 666421444);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 109, 'lilnina', '$2y$10$bTJm4Eb7/IpkZUbd11E5Q.hYpP1PUujxSVKZr.3whEKwGLHlOPlwa', 'nina sutton', 969420333, 'nina.sutton76@example.com', '1997/10/9', '2018/2/3', 'Active', false, 'default.png', 666421555);
INSERT INTO "Users"(confirmation_code, remember_token, user_id, username, password, fullname, phone_number, email, birth_date, admission_date, state, admin, img, nif) VALUES('', '', 110, 'lilnisna2', '$2y$10$i2qsWjTev8oY/GqJ3GtVM.hpF8rdtNRPDyPxd/vNAakkKHFXrrow2', 'nina sutton2', 969420332, 'nina.sutton762@example.com', '1997/10/2', '2018/2/2', 'Active', false, 'default.png', 666221555);

-- 100 cheekybreeky:     $2y$10$KpcYrPtUzXQTG65mlBEfV.HKlDn7WDIN8BsPDZBgsGOnb4rbh49RS
-- 101 oblivion:         $2y$10$S52KODGbYIUIEsQlkjYjreMRIJq24jDFV/H4U9i4gLuaONRhPYx9G
-- 102 morrowind:        $2y$10$sjD2aP0uBcLn17MNG2lqyOZl3SEgf89HoEMVJgLJqaLIkn/rkvZci
-- 103 zdarovia:         $2y$10$jVJye8bH/JS3FE25/6x8xOx8cdgcorH0VNEccmiBlPnZWUVt21m62
-- 104 notoriousbig:     $2y$10$FOR8bKgMT2qGQOUaXruwquS2I6kjqN//IxRq67se4D.Xhdw05QCrK
-- 105 yeezytaughtme:    $2y$10$1CMTjr7xwoPKt.mX7xQxde8U3GSKlnaV0gbpzgmKe0n5vz291Mltq
-- 106 hoffhoff:         $2y$10$S8jVUU90WS/lEEDvJCsR7u0wbS/FBd5ctIDLjbSIFv.H36E5.RYgO
-- 107 noided:           $2y$10$6V1/GCBl.zOggF6zd17TCObHfLVxlPXMwQPeRcnXdmnl3m88ZMjyO
-- 108 cardibandrum:     $2y$10$0HrAIJwLU1JPiZ69HjUwIO5PTzWXroz15V5YP7H8msR6644fT6gGK
-- 109 groovey:          $2y$10$bTJm4Eb7/IpkZUbd11E5Q.hYpP1PUujxSVKZr.3whEKwGLHlOPlwa
-- 110 groovey2:         $2y$10$i2qsWjTev8oY/GqJ3GtVM.hpF8rdtNRPDyPxd/vNAakkKHFXrrow2


-- Sellers (user_id, professional_email, professional_name, professional_phone)
INSERT INTO "Sellers"(user_id, professional_email, professional_name, professional_phone) VALUES (105, 'ableton@gmail.com', 'ableton', 912345678);
INSERT INTO "Sellers"(user_id, professional_email, professional_name, professional_phone) VALUES (106, 'adobe@gmail.com', 'adobe', 913456789);
INSERT INTO "Sellers"(user_id, professional_email, professional_name, professional_phone) VALUES (107, 'microsoft@gmail.com', 'microsoft', 912543876);
INSERT INTO "Sellers"(user_id, professional_email, professional_name, professional_phone) VALUES (108, 'sony@gmail.com', 'sony', 913654987);
INSERT INTO "Sellers"(user_id, professional_email, professional_name, professional_phone) VALUES (109, 'blender@gmail.com', 'blender', 919876543);

-- Products (product_id, user_id, description, release_date, operating_system, price, logo_path, name)
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Ableton', 'Ableton', FALSE, 200, 105, 'Ableton Live is a software music sequencer and digital audio workstation for macOS and Windows.
                                                                                                                                                    The latest major release of Live, Version 10, was released on February 6, 2018.
                                                                                                                                                    In contrast to many other software sequencers, Live is designed to be an instrument
                                                                                                                                                    for live performances as well as a tool for composing, recording, arranging, mixing,
                                                                                                                                                   and mastering, as shown by Ableton''s companion hardware product, Ableton Push. It is also
                                                                                                                                                   used by DJs, as it offers a suite of controls for beatmatching, crossfading, and other effects
                                                                                                                                                   used by turntablists, and was one of the first music applications to automatically beatmatch songs.'
    , '2015/10/20', 'wml', 599, 'ableton9.png', 'ableton 9 live suite');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Adobe', 'Adobe', FALSE, 201, 106, 'image editing software', '2016/2/14', 'wml', 599, 'photoshop.png', 'adobe photoshop');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Microsoft', 'Microsoft', FALSE, 202, 107, 'programming ide', '2018/3/12', 'w', 199, 'visualstudio.jpg', 'visual studio 2018');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Sony', 'Sony', FALSE, 203, 108, 'video editing software', '2014/1/22', 'wm', 299, 'sonyvegas.png', 'sony vegas pro');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Blender', 'Blender', FALSE, 204, 109, '3d rendering and editing software', '2013/10/12', 'wml', 0, 'blender.png', 'blender');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Ableton', 'Ableton', FALSE, 205, 105, 'synthetizer plug in for ableton', '2017/11/21', 'wml', 29, 'massive.png', 'ableton massive plugin');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Adobe', 'Adobe', FALSE, 206, 106, 'vector graphic design software', '2016/4/1', 'wml', 99, 'ilustrator.png', 'adobe ilustrator');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Microsoft', 'Microsoft', FALSE, 207, 107, 'programming text editor', '2017/11/10', 'w', 0, 'visualcode.png', 'microsoft visual code');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Sony', 'Sony', FALSE, 208, 108, 'digital audio editing suite software', '2002/7/12', 'wm', 199, 'soundforge.png', 'sony sound forge');
INSERT INTO "Products" (publisher, developer, hidden, product_id, user_id, description, release_date, operating_system, price, logo_path, name) VALUES ('Blender', 'Blender', FALSE, 209, 109, 'dynamic mixing device', '2018/10/9', 'wml', 99, 'channelblender.jpg', 'channel blender');

-- Product Images (product_id, img_path)
INSERT INTO "ProductImages"(product_id, img_path) VALUES (200, 'ableton9.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (200, 'photoshop.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (202, 'visualstudio.jpg');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (203, 'sonyvegas.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (204, 'blender.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (205, 'massive.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (206, 'ilustrator.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (207, 'visualcode.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (208, 'soundforge.png');
INSERT INTO "ProductImages"(product_id, img_path) VALUES (209, 'channelblender.jpg');

-- Tags (product_id, tag_name)
INSERT INTO "Tags"(product_id, tag_name) VALUES (200, 'daw');
INSERT INTO "Tags"(product_id, tag_name) VALUES (201, 'image');
INSERT INTO "Tags"(product_id, tag_name) VALUES (202, 'programming');
INSERT INTO "Tags"(product_id, tag_name) VALUES (203, 'video');
INSERT INTO "Tags"(product_id, tag_name) VALUES (204, '3d');
INSERT INTO "Tags"(product_id, tag_name) VALUES (205, 'audio');
INSERT INTO "Tags"(product_id, tag_name) VALUES (206, 'design');
INSERT INTO "Tags"(product_id, tag_name) VALUES (207, 'text');
INSERT INTO "Tags"(product_id, tag_name) VALUES (208, 'audio');
INSERT INTO "Tags"(product_id, tag_name) VALUES (209, '3d');

-- SerialKeys (sk_id, user_id, product_id, code)
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (500, 105, 200, '1J6B5JHG7I');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (501, 106, 201, '0FIAJ5N6B3');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (502, 107, 202, '09FUHRB5N6');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (503, 108, 203, 'S0HNS4K6HS');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (504, 109, 204, 'OFCJAGHI54');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (505, 105, 205, '0SAIDUFRKF');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (506, 106, 205, 'SGHUDIFOG3');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (507, 107, 207, '5URJEDKHA4');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (508, 108, 208, '38HUEDWXJH');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (509, 109, 209, 'IODIGHOI2N');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (510, 109, 209, 'IODIGHOP2N');
INSERT INTO "SerialKeys"(sk_id, assignment_id, product_id, code) VALUES (513, null, 201, 'IODIGHOP2A');


-- Reviews (sk_id, rating, review_date, comment)
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (500, 4, '2018/3/1', 'very good product although a tad expensive');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (501, 5, '2017/4/12', 'i am amazed at this product it is very nice');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (502, 5, '2018/10/25', 'this is an incredible piece of software');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (503, 4, '2017/6/15', 'the product fulfills its purpose with precision');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (504, 3, '2018/2/5', 'hey thats pretty good');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (505, 5, '2018/8/14', 'i am astonished at how efficient this product is');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (506, 2, '2018/4/22', 'way too expensive for the amount of features it comes with');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (507, 4, '2017/10/30', 'way too cheap for the amount of features it comes with');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (508, 1, '2016/7/6', 'absolutely atrocious, barely works, cant even install it');
INSERT INTO "Reviews"(sk_id, rating, review_date, comment) VALUES (509, 3, '2018/12/14', 'its nice but there are way better options out there');

-- Discounts (product_id, discounted_rice, begin_date, end_date)
INSERT INTO "Discounts"(product_id, discounted_price, begin_date, end_date) VALUES (200, 20, '2018/5/10', '2019/5/20');
INSERT INTO "Discounts"(product_id, discounted_price, begin_date, end_date) VALUES (201, 20, '2018/5/10', '2019/5/20');
INSERT INTO "Discounts"(product_id, discounted_price, begin_date, end_date) VALUES (202, 30, '2018/5/10', '2019/5/20');
INSERT INTO "Discounts"(product_id, discounted_price, begin_date, end_date) VALUES (203, 20, '2017/12/1', '2019/1/4');
INSERT INTO "Discounts"(product_id, discounted_price, begin_date, end_date) VALUES (204, 15, '2018/4/1', '2019/4/30');

-- Purchases (purchase_id, final_price, user_id, sk_id, paid_date, paymentmethod, details)
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (800, 579, 100, '2018/4/21', 'Credit Card', 'Purchase successful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (801, 579, 101, '2018/6/12', 'Credit Card', 'Purchase successful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (802, 169, 102, '2018/5/2', 'PayPal', 'Minor setbacks contacting seller');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (803, 279, 103, '2018/6/23', 'Banking Transfer', 'Purchase successful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (804, 14, 104, '2018/3/31', 'Banking Transfer', 'Minor setbacks contacting seller');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (805, 29, 100, '2018/1/26', 'Credit Card', 'Purchase sucessful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (806, 99, 101, '2018/8/1', 'PayPal', 'Purchase successful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (807, 579, 102, '2018/11/4', 'PayPal', 'Purchase successful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (808, 199, 103, '2018/3/10', 'PayPal', 'Purchase successful');
INSERT INTO "Purchases"(purchase_id, final_price, user_id, paid_date, payment_method, details) VALUES (809, 99, 104, '2018/9/2', 'Credit Card', 'Purchase successful');

-- Wishlists (user_id, product_id)
INSERT INTO "Wishlists"(user_id, product_id) VALUES (100, 209);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (101, 208);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (102, 207);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (103, 206);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (104, 205);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (105, 204);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (106, 203);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (107, 202);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (108, 201);
INSERT INTO "Wishlists"(user_id, product_id) VALUES (109, 200);

-- PurchasedKeys

INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price) VALUES (500, 800,32 );
INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price) VALUES (501, 801, 53);
INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price) VALUES (502, 802, 66);
INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price) VALUES (503, 803,77 );
INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price) VALUES (504, 804, 100);
INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price) VALUES (505, 805,52 );

ALTER SEQUENCE "SerialGenerator" RESTART WITH 999;

-- Invoices

--INSERT INTO "Invoices" (final_price, user_id, emission_date, payment_method, state) VALUES ();





-- Required code

DROP TABLE IF EXISTS "SearchTable" CASCADE;
DROP FUNCTION IF EXISTS "paymentRun"(integer,DATE,paymentMethod,double precision, text);

--This table is used to temporarily store product IDs during a transaction
CREATE TABLE "SearchTable" (
    product_id integer NOT NULL,
    price double precision,
    sk_id integer
);


CREATE VIEW "KeysForSale" AS
SELECT "Products".product_id, "Discounts".begin_date, "Discounts".end_date, "Products".price, "Discounts".discounted_price, "SerialKeys".sk_id, "Products".user_id
FROM (("Products"
LEFT JOIN "Discounts" ON "Products".product_id = "Discounts".product_id)
INNER JOIN "SerialKeys" ON "Products".product_id = "SerialKeys".product_id AND assignment_id IS NULL);

--NOT IMPLEMENTED
--CREATE FUNCTION "invoiceToPurchase"()

--CREATE TRIGGER "moveInvoiceToPurchase"
    --AFTER INSERT OR UPDATE ON "Invoices"
    --FOR EACH ROW
    --EXECUTE PROCEDURE "invoiceToPurchase"(); 

    
-- Function to be executed during transaction
CREATE FUNCTION "paymentRun"(buyer_id integer, payment_date DATE, payMethod paymentMethod, paid_amount double precision, payDetails text) RETURNS VOID AS
$$
DECLARE
    row_STab "SearchTable"%rowtype;
    curProd  "KeysForSale"%rowtype;
    totalPrice double precision;
    returnedPID integer;
BEGIN

    --For each entry in the search table
    FOR row_STab IN 
    (
        SELECT *
        FROM "SearchTable"
    )
    LOOP
    
        --We retrieve the associated product info, together with an available key
        curProd := (
            SELECT "KeysForSale"
            FROM "KeysForSale"
            WHERE row_STab.product_id = "KeysForSale".product_id AND (("KeysForSale".begin_date < payment_date AND "KeysForSale".end_date > payment_date) OR ("KeysForSale".discounted_price IS NULL))
            ORDER BY "KeysForSale".discounted_price ASC NULLS LAST
            LIMIT 1
        );
        
        --Either there is no such product, or no keys for it
        IF curProd IS NULL THEN
            RAISE EXCEPTION 'Product is not available for purchase.';
        END IF;
        
        --Product's seller is the buyer - we can't let that pass
        IF curProd.user_id = buyer_id THEN
            RAISE EXCEPTION 'A Seller cannot purchase their own product.';
        END IF;
        
        --Fill in the rest of the data to prepare the purchase
        UPDATE "SearchTable"
        SET price = (
            CASE curProd.discounted_price IS NOT NULL -- if there was a discounted price, use it
            WHEN TRUE THEN curProd.discounted_price
            ELSE curProd.price
            END
            ), sk_id = curProd.sk_id 
        WHERE "SearchTable".product_id = curProd.product_id;
            
    END LOOP;

    --Get total cost
    totalPrice := (
        SELECT SUM("SearchTable".price)
        FROM "SearchTable"
    );
    
    
    
    --Create a purchase while keeping it's ID for register
    INSERT INTO "Purchases" (purchase_id, final_price, user_id, paid_date, payment_method, details)
    VALUES (DEFAULT, totalPrice, buyer_id, payment_date, payMethod, payDetails)
    RETURNING purchase_id INTO returnedPID;

    --For each product we wish to purchase
    FOR row_STab IN 
    (
        SELECT *
        FROM "SearchTable"
    )
    LOOP
        
        INSERT INTO "PurchasedKeys"(sk_id, purchase_id, price)
        VALUES (row_STab.sk_id, returnedPID, row_STab.price);
        
        UPDATE "SerialKeys"
        SET assignment_id = buyer_id
        WHERE row_STab.sk_id = "SerialKeys".sk_id;
        
    END LOOP;
    
    
    
END
$$
LANGUAGE 'plpgsql' ;
