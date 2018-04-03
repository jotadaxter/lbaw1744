CREATE INDEX username_user ON "Users" USING hash (lower(username));

CREATE INDEX last_product ON "Products" (release_date);

CREATE INDEX price_product ON "Products" (price);

CREATE INDEX promotions ON "Discounts" (start_date) 
WHERE (CURRENT_DATE BETWEEN start_date AND end_date);