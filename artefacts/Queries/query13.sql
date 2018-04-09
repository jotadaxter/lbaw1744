-- Obter Produtos com um minimo de rating

SELECT *
FROM "Products"
--WHERE $minRating < (
WHERE 2. < (
	SELECT AVG("Reviews".rating) as AvgRating
	FROM "Reviews"
	INNER JOIN "SerialKeys" ON "SerialKeys".sk_id = "Reviews".sk_id
	WHERE "SerialKeys".product_id = "Products".product_id;
) ORDER BY AvgRating DESC;
