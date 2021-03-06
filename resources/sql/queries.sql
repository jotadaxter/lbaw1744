--User's info:

SELECT * 
FROM "Users" 
WHERE "Users".username = $userName;

--Product's info:

SELECT * 
FROM "Products" 
WHERE "Products".product_id = $productId;

--User's Wishlist:

SELECT *
FROM "Products" 
INNER JOIN "Wishlists" ON "Wishlists".product_id = "Products".product_id
WHERE "Wishlists".user_id = $userId;

--User's Purchased Products:

SELECT *
FROM "Products"
WHERE "Products".product_id IN (
	SELECT DISTINCT product_id
	FROM (("PurchasedKeys"
	INNER JOIN "Purchases" ON "PurchasedKeys".purchase_id = "Purchases".purchase_id)
	INNER JOIN "SerialKeys" ON "PurchasedKeys".sk_id = "SerialKeys".sk_id)
	WHERE "Purchases".user_id = $userId
);

--Search for product by name or tag

SELECT * 
FROM "Products" 
WHERE "Products".name LIKE '%$search%' OR EXISTS (
	SELECT "Tags".tag_name
	FROM "Tags"
	WHERE "Products".product_id = "Tags".product_id AND "Tags".tag_name LIKE '%$search%'
) ORDER BY "Products".name ASC;

--Search for product reviews, including reviewer's ID

SELECT "Reviews".rating, "Reviews".comment, "Reviews".review_date, "Users".username, "Users".img, "Users".user_id
FROM (("Reviews"
INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id)
INNER JOIN "Users" ON "SerialKeys".user_id = "Users".user_id)
WHERE "SerialKeys".product_id = $productId
ORDER BY "Reviews".rating DESC;

--Pre-login Handshake (through username, e-mail or phone number)

SELECT "Users".username, "Users".password
FROM "Users"
WHERE "Users".username = $idText OR "Users".email = $idText;

--Product's images:

SELECT "ProductImages".img_path 
FROM "ProductImages" 
WHERE "ProductImages".product_id = $productId;

--Get product's overall rating

SELECT AVG("Reviews".rating)
FROM "Reviews"
INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id
WHERE "SerialKeys".product_id = $productId;

--Most Trending Products in the last "trendTime" days

SELECT *
FROM "Products"
WHERE "Products".product_id IN (
	SELECT product_id
	FROM (
	SELECT "SerialKeys".product_id, COUNT(*) 
	FROM (("PurchasedKeys"	
	INNER JOIN "SerialKeys" ON "PurchasedKeys".sk_id = "SerialKeys".sk_id)
	INNER JOIN "Purchases" ON "PurchasedKeys".purchase_id = "Purchases".purchase_id)
	WHERE "SerialKeys".product_id = "Products".product_id AND "Purchases".paid_date >= NOW() - INTERVAL '$trendTime day'
	GROUP BY "SerialKeys".product_id
	ORDER BY 2 DESC) AS DERP
)

-- Get product's with discounts

SELECT product_id 
FROM "Discounts" 
WHERE (CURRENT_DATE BETWEEN "Discounts".begin_date AND "Discounts".end_date);

-- Obter produtos numa range de valores

SELECT * 
FROM "Products" 
LEFT JOIN "Discounts" ON "Products".product_id = "Discounts".product_id
WHERE ("Products".price > $minPrice AND "Products".price < $maxPrice) OR ("Discounts".discounted_price > $minPrice AND "Discounts".discounted_price < $maxPrice);

-- Obter Produtos com um minimo de rating

SELECT *
FROM "Products"
WHERE $minRating < (
	SELECT AVG("Reviews".rating) as AvgRating
	FROM "Reviews"
	INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id
	WHERE "SerialKeys".product_id = "Products".product_id;
) ORDER BY AvgRating DESC;

-- Colocar uma querie para buscar os produtos com um certo Sistema Operativo

SELECT * FROM "Products" WHERE "Products".operating_system = '%$opSystem%'; 

-- Colocar uma querie que vá buscar as tags de um produto
SELECT * FROM "Tags" WHERE "Tags".product_id = $product_id;
