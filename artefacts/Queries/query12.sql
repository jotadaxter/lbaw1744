-- Obter produtos numa range de valores
--SELECT * FROM "Products" WHERE "Products".price > $minPrice AND "Products".price < $maxPrice;  
SELECT * FROM "Products" WHERE "Products".price > 20 AND "Products".price < 30;  
