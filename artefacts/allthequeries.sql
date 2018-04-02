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
	SELECT DISTINCT "PurchasedProducts".product_id 
	FROM "PurchasedProducts"
	INNER JOIN "Purchases" ON "PurchasedProducts".purchase_id = "Purchases".purchase_id
	WHERE "Purchases".user_id = $userId
);

--Search for product by name or tag

SELECT * 
FROM "Products" 
WHERE "Products".name LIKE %$search% OR EXISTS (
	SELECT "Tags".tag_name
	FROM "Tags"
	WHERE "Products".product_id = "Tags".product_id AND "Tags".tag_name LIKE %$search%
) ORDER BY "Products".name ASC;

--Search for product reviews, including reviewer's ID

SELECT "Reviews".rating, "Reviews".comment, "Reviews".review_date, "Users".username, "Users".img, "Users".user_id
FROM (("Reviews"
INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id)
INNER JOIN "Users" ON "SerialKeys".owner_id = "Users".user_id)
WHERE "SerialKeys".product_id = $productId
ORDER BY "Reviews".rating DESC;

--Pre-login Handshake (through username, e-mail or phone number)

SELECT "Users".username, "Users".password
FROM "Users"
WHERE "Users".username = $idText OR "Users".email = $idText OR "Users".phone_number = $idText;

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
	SELECT "PurchasedProducts".product_id, COUNT(*) 
	FROM "PurchasedProducts"
	INNER JOIN "Purchases" ON "PurchasedProducts".purchase_id = "Purchases".purchase_id
	WHERE "PurchasedProducts".product_id = "Products".product_id AND "Purchases".paid_date >= NOW() - INTERVAL $trendTime DAY
	GROUP BY "PurchasedProducts".product_id
	ORDER BY 2 DESC
)


