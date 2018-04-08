    --TRIGGERS
 
-- adding repeated item
CREATE FUNCTION add_repeated_item() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM Products WHERE NEW.user_id = seller.id AND New.product_id = product_id) THEN
        RAISE EXCEPTION 'A seller cannot add a product that has already been added.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_repeated_item
    BEFORE INSERT ON Products
    FOR EACH ROW
        EXECUTE PROCEDURE add_repeated_item();
--adding repeated item

-- adding repeated tags
CREATE FUNCTION add_repeated_tag() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM Tags WHERE NEW.tag_name = tag_name) THEN
        RAISE EXCEPTION 'Cannot add to the database a Tag that has already been added';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_repeated_tag
    BEFORE INSERT ON Tags
    FOR EACH ROW
        EXECUTE PROCEDURE add_repeated_tag();
-- adding repeated tags

-- adding repeated item to wishlist
CREATE FUNCTION add_repeated_item_to_wishlist() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM Wishlists WHERE NEW.user_id = user_id AND NEW.product_id = product_id) THEN
        RAISE EXCEPTION 'Cannot add to a Wishlist a Product that has already been added.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_repeated_item_to_wishlist
    BEFORE INSERT OR UPDATE ON Wishlists
    FOR EACH ROW
        EXECUTE PROCEDURE add_repeated_item_to_wishlist();
-- adding repeated item to wishlist

-- adding repeated item to wishlist
CREATE FUNCTION add_seller_product_to_wishlist() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM Wishlists
        INNER JOIN Products ON Products.product_id = Wishlists.product_id
        WHERE NEW.product_id = product_id AND New.user_id = seller_id) THEN
        RAISE EXCEPTION 'A Seller cannot add a product it is currently selling to its own Wishlist.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_seller_product_to_wishlist
    BEFORE INSERT OR UPDATE ON Wishlists
    FOR EACH ROW
        EXECUTE PROCEDURE add_seller_product_to_wishlist();
-- adding repeated item to wishlist


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
