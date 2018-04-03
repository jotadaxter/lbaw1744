--Search for product by name or tag

SELECT * 
FROM "Products" 
--WHERE "Products".name LIKE %$search% OR EXISTS (
WHERE "Products".name LIKE '%au%' OR EXISTS (
	SELECT "Tags".tag_name
	FROM "Tags"
	--WHERE "Products".product_id = "Tags".product_id AND "Tags".tag_name LIKE %$search%
	WHERE "Products".product_id = "Tags".product_id AND "Tags".tag_name LIKE '%au%'
) ORDER BY "Products".name ASC;