--Get product's overall rating

SELECT AVG("Reviews".rating)
FROM "Reviews"
INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id
WHERE "SerialKeys".product_id = 204;
--WHERE "SerialKeys".product_id = $productId;