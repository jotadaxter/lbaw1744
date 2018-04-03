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
	--WHERE "SerialKeys".product_id = "Products".product_id AND "Purchases".paid_date >= NOW() - INTERVAL $trendTime DAY
	WHERE "SerialKeys".product_id = "Products".product_id AND "Purchases".paid_date >= NOW() - INTERVAL '10 day'
	GROUP BY "SerialKeys".product_id
	ORDER BY 2 DESC) AS DERP
)