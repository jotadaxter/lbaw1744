-- Login and View Profile

select user where username=  and pass=

-- Register (MAIN)

INSERT INTO "User" (username, password, fullname, email, phone_number, birth_date, admin, img, nif) 
VALUES ($username, $password, $fullname, $email, $phone_number, $birth_date, FALSE, $img, $nif);

-- Edit Profile

update set where

-- Password Reset Form

select user where email=

-- Password Change Form

update set where

-- User History  

--------------------------------------------------------------------------------------------

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