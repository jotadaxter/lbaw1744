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
	
-- Review a Product

INSERT INTO "Reviews" (rating, comment) 

-- Suspend a user 

UPDATE "Users" SET "Users".state = "suspended" Where "User".username=$username;










