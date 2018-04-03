-- Get product's with discounts

SELECT product_id 
FROM "Discounts" 
WHERE (CURRENT_DATE BETWEEN "Discounts".begin_date AND "Discounts".end_date);