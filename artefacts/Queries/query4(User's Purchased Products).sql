--User's Purchased Products:

SELECT *
FROM "Products"
WHERE "Products".product_id IN (
	SELECT DISTINCT product_id
	FROM (("PurchasedKeys"
	INNER JOIN "Purchases" ON "PurchasedKeys".purchase_id = "Purchases".purchase_id)
	INNER JOIN "SerialKeys" ON "PurchasedKeys".sk_id = "SerialKeys".sk_id)
	WHERE "Purchases".user_id =102
);