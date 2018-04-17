--Pre-login Handshake (through username, e-mail or phone number)

SELECT "Users".username, "Users".password
FROM "Users"
--WHERE "Users".username = $idText OR "Users".email = $idText;
WHERE "Users".username = 'ken.gonzalez84@example.com' OR "Users".email = 'ken.gonzalez84@example.com';
