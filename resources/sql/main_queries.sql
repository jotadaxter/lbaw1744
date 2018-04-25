-------------------------
---     Users      ------
-------------------------


-- Login and View Profile

select * from "Users" where "Users".username=$username;

-- Register

INSERT INTO "User" (username, password, fullname, email, phone_number, birth_date, admin, img, nif) 
VALUES ($username, $password, $fullname, $email, $phone_number, $birth_date, FALSE, $img, $nif);

-- Edit Profile

update "Users" set "Users".username=$username, "Users".password=$password, "Users".fullname=$fullname, "Users".email=$email, 
"Users".phone_number=$phone_number, "Users".birth_date=$birth_date, "Users".nif=$nif, "Users".img=$new_img_path,   
where "Users".user_id = $user_id

-- Password Reset Form

select * from "Users" where "Users".email=$email;

-- Password Change Form

update "Users" set "Users".password=$password where "Users".email=$email;

-- User History (Purchased Products)
SELECT *
FROM "Products" As Purchased_Products
WHERE Purchased_Products.product_id IN (
	SELECT DISTINCT "SerialKeys".product_id
	FROM (("PurchasedKeys"
	INNER JOIN "Purchases" ON "PurchasedKeys".purchase_id = "Purchases".purchase_id)
	INNER JOIN "SerialKeys" ON "PurchasedKeys".sk_id = "SerialKeys".sk_id)
	WHERE "Purchases".user_id =$user_id
);

-- User History (Sold Products)

SELECT *
FROM "Products" AS Sold_Products
WHERE Sold_Products.products_id IN(
	SELECT "SerialKeys".product_id, COUNT(*) 
FROM "SerialKeys"
INNER JOIN "Products" ON "Products".product_id = "SerialKeys".product_id 
	AND "Products".user_id = $user_id
WHERE "SerialKeys".assignment_id IS NOT NULL
GROUP BY "SerialKeys".product_id;
);


-------------------------
---     Products   ------
-------------------------

--Most Trending Products in the last trendTime days, with discounts, in a range of prices, from a specific operating system

SELECT * 
FROM "Products", "Discounts"
WHERE "Products".product_id IN 
	( SELECT product_id FROM 
		( SELECT "SerialKeys".product_id, COUNT(*) 
		  FROM (("PurchasedKeys" INNER JOIN "SerialKeys" ON "PurchasedKeys".sk_id = "SerialKeys".sk_id) 
			INNER JOIN "Purchases" ON "PurchasedKeys".purchase_id = "Purchases".purchase_id) 
		  WHERE "SerialKeys".product_id = "Products".product_id AND "Purchases".paid_date >= NOW() - INTERVAL '$interval day' 
		  GROUP BY "SerialKeys".product_id ORDER BY 2 DESC) AS DERP )
	AND "Products".operating_system LIKE '%$operating_system%'
	AND (CURRENT_DATE BETWEEN "Discounts".begin_date AND "Discounts".end_date)
	AND "Products".product_id="Discounts".product_id
	AND "Products".name = $product_name;
	
-- View Product

Select * 
from "Products" INNER JOIN "ProductImages" ON "ProductImages".product_id="Products".product_Id;
WHERE "Products".product_id=$product_id;


-- Add new Product 

INSERT INTO "Products" (user_id, description, release_date, operating_system, price, logo_path, name)
VALUES ($user_id, $description, $release_date, $operating_system, $price, $logo_path, $name);


-- Edit Product 

UPDATE "Products" 
SET "Products".description=$description, "Products".release_date=$release_date, "Products".operating_system=$operating_system, 
	"Products".price=$price, "Products".logo_path=$logo_path, "Products".name=$name 
WHERE "Products".product_id=$product_id;


-- Remove Product

DELETE FROM "Products" WHERE "Products".product_id=$product_id;

-- Add image to Product

INSERT INTO "ProductImages" (product_id, img_path) VALUES ($product_id, $new_image_path);

-- Delete Image from a product's gallery

DELETE FROM "ProductImages" WHERE "ProductImages".product_id=$product_id;


--------------------------
-- Reviews and Wishlist --
--------------------------

-- View Product's reviews

SELECT "Reviews".rating, "Reviews".review_date, "Reviews".comment
FROM "Reviews" INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id
WHERE "SerialKeys".product_id = $product_id;

-- Review a Product

INSERT INTO "Reviews" (rating, comment) 

-- Edit a Review

Update "Reviews" SET "Reviews".rating = $rating, "Reviews".comment = $comment WHERE "Reviews".sk_id = sk_id;

-- Delete a Review
 
DELETE FROM "Reviews" WHERE "Reviews".sk_id = $sk_id;

-- View Wishlist

SELECT *
FROM "Products" 
INNER JOIN "Wishlists" ON "Wishlists".product_id = "Products".product_id
WHERE "Wishlists".user_id = $userId;

-- Add Product to Wishlist

INSERT INTO "Whishlists" (user_id, product_id) VALUES ($user_id, $product_id);

-- Remove Product from WishList
DELETE FROM "Whishlists" WHERE "Whishlists".user_id = $user_id AND "Whishlists".product_id = $product_id;


--------------------------
--  Cart and Checkout   --
--------------------------




--------------------------
-- User Administration  --
--------------------------

-- Get All Users
SELECT * "Users" FROM "Users" INNER JOIN "Sellers" ON "Users".id = "Sellers".user_id;

-- Suspend a user 

UPDATE "Users" SET "Users".state = "blocked" Where "Users".username=$username;

-- Reinstate USER

UPDATE "Users" SET "Users".state = "inactive" WHERE "Users".username=$username;


--------------------------
--       Triggers       --
--------------------------

--WHEN login, if inactive UPDATE state to active
--WHEN logout, if active UPDATE state to inactive

--se passasse de por pagar para pago, tinha um trigger 
--no alter q automaticamente registava a compra finalizada
--ou entao, se mudasse para cancelada, limpava o assignment id das keys



