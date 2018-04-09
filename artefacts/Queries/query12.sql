-- Obter produtos numa range de valores

SELECT * 
FROM "Products" 
LEFT JOIN "Discounts" ON "Products".product_id = "Discounts".product_id
--WHERE ("Products".price > $minPrice AND "Products".price < $maxPrice) OR ("Discounts".discounted_price > $minPrice AND "Discounts".discounted_price < $maxPrice);
WHERE ("Products".price > 10. AND "Products".price < 30.) OR ("Discounts".discounted_price > 10. AND "Discounts".discounted_price < 30.);
