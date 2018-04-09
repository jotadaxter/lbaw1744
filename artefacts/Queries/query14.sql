-- Colocar uma querie para buscar os produtos com um certo Sistema Operativo

-- SELECT * FROM "Products" WHERE "Products".operating_system = '%$opSystem%';  
SELECT * FROM "Products" WHERE "Products".operating_system LIKE '%w%'
