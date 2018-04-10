    --TRIGGERS
    
CREATE FUNCTION check_cheeky_name() RETURNS TRIGGER AS
$BODY$
BEGIN
  IF CONTAINS (NEW.username $badWordList) OR CONTAINS (NEW.email, $badWordList) OR
  CONTAINS (NEW.fullname, $badWordList)
  THEN RAISE EXCEPTION 'Please do not use offensive language.';
  END IF;
RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER check_cheeky_name
  BEFORE INSERT OR UPDATE ON "Users"
  FOR EACH TROW EXECUTE PROCEDURE check_cheeky_name();
  
 -- não deixar o produto de um user vá para a sua whislist
  CREATE FUNCTION product_wish_list() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM "Products" WHERE NEW.product_id = product_id AND NEW.user_id = user_id) THEN
        RAISE EXCEPTION 'An users item cannot be in his wish list.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER product_wish_list
    BEFORE INSERT OR UPDATE ON Wishlists
    FOR EACH ROW
    EXECUTE PROCEDURE product_wish_list(); 
