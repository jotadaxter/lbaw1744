--User's Wishlist:

SELECT *
FROM "Products" 
INNER JOIN "Wishlists" ON "Wishlists".product_id = "Products".product_id
WHERE "Wishlists".user_id = 105;
--WHERE "Wishlists".user_id = $userId;