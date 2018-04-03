--Search for product reviews, including reviewer's ID

SELECT "Reviews".rating, "Reviews".comment, "Reviews".review_date, "Users".username, "Users".img, "Users".user_id
FROM (("Reviews"
INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id)
INNER JOIN "Users" ON "SerialKeys".user_id = "Users".user_id)
--WHERE "SerialKeys".product_id = $productId
WHERE "SerialKeys".product_id = 208
ORDER BY "Reviews".rating DESC;