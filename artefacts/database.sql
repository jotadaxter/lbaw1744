
CREATE TYPE paymentmethod AS ENUM (
    'Credit Card',
    'PayPal',
    'Banking Transfer'
);


CREATE TYPE userstate AS ENUM (
    'Active',
    'Inactive',
    'Blocked',
    'Banned'
);


	-- Tables

CREATE TABLE "Discounts" (
    product_id integer NOT NULL,
    discounted_price double precision NOT NULL,
    begin_date timestamp with time zone DEFAULT now() NOT NULL,
    end_date timestamp with time zone NOT NULL,
    CONSTRAINT "Discounts_check" CHECK (end_date > begin_date),
    CONSTRAINT "Discounts_discounted_price_check" CHECK (discounted_price >= 0.)
);


CREATE TABLE "ProductImages" (
    product_id integer NOT NULL,
    img_path text NOT NULL
);


CREATE TABLE "Products" (
    product_id SERIAL NOT NULL,
    seller_id integer NOT NULL,
    description text NOT NULL,
    release_date timestamp with time zone NOT NULL,
    operating_system text NOT NULL,
    price double precision NOT NULL,
    logo_path text NOT NULL,
    name text NOT NULL,
    CONSTRAINT "Products_price_check" CHECK (price >= 0.)
);


CREATE TABLE "Purchases" (
    purchase_id SERIAL NOT NULL,
    final_price double precision NOT NULL,
    buyer_id integer NOT NULL,
    paid_date timestamp with time zone DEFAULT now() NOT NULL,
    payment_method paymentmethod,
    details text,
    CONSTRAINT "Payments_check" CHECK ((final_price > 0. AND payment_method <> NULL) OR (final_price = 0. AND payment_method = NULL))
);


CREATE TABLE "Reviews" (
	sk_id integer NOT NULL,
    rating integer NOT NULL,
    review_date timestamp with time zone DEFAULT now() NOT NULL,
    "comment" text
);


CREATE TABLE "Sellers" (
    user_id integer NOT NULL,
    professional_email text NOT NULL,
    professional_name text NOT NULL,
    professional_phone integer NOT NULL
);


CREATE TABLE "SerialKeys" (
	sk_id SERIAL NOT NULL,
    owner_id integer,
    product_id integer NOT NULL,
    code text NOT NULL
);


CREATE TABLE "Tags" (
    product_id SERIAL NOT NULL,
    tag_name text NOT NULL
);


CREATE TABLE "Users" (
    user_id SERIAL NOT NULL,
    username text NOT NULL,
    password text NOT NULL,
    fullname text,
    email text NOT NULL,
    phone_number integer,
    birth_date timestamp with time zone NOT NULL,
    admission_date timestamp with time zone DEFAULT now() NOT NULL,
    "state" userstate DEFAULT 'Active' NOT NULL,
    "admin" boolean DEFAULT false NOT NULL,
    img text,
    nif integer
);


CREATE TABLE "Wishlists" (
    user_id integer NOT NULL,
    product_id integer NOT NULL
);

CREATE TABLE "PurchasedKeys" (
    sk_id integer NOT NULL,
    purchase_id integer NOT NULL,
    price double precision NOT NULL
);



	-- Primary Keys and Uniques


ALTER TABLE ONLY "Discounts"
    ADD CONSTRAINT "Discounts_pkey" PRIMARY KEY (product_id);


ALTER TABLE ONLY "ProductImages"
    ADD CONSTRAINT "ProductImages_pkey" PRIMARY KEY (product_id, img_path);


ALTER TABLE ONLY "Products"
    ADD CONSTRAINT "Products_name_key" UNIQUE (name);


ALTER TABLE ONLY "Products"
    ADD CONSTRAINT "Products_pkey" PRIMARY KEY (product_id);


ALTER TABLE ONLY "Purchases"
    ADD CONSTRAINT "Purchases_pkey" PRIMARY KEY (purchase_id);


ALTER TABLE ONLY "Reviews"
    ADD CONSTRAINT "Reviews_pkey" PRIMARY KEY (sk_id);

ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_pkey" PRIMARY KEY (user_id);


ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_professional_email_key" UNIQUE (professional_email);


ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_user_id_key" UNIQUE (user_id);


ALTER TABLE ONLY "SerialKeys"
    ADD CONSTRAINT "SerialKeys_pkey" PRIMARY KEY (sk_id);


ALTER TABLE ONLY "Tags"
    ADD CONSTRAINT "Tags_pkey" PRIMARY KEY (product_id, tag_name);


ALTER TABLE ONLY "Users"
    ADD CONSTRAINT "Users_email_key" UNIQUE (email);


ALTER TABLE ONLY "Users"
    ADD CONSTRAINT "Users_pkey" PRIMARY KEY (user_id);


ALTER TABLE ONLY "Users"
    ADD CONSTRAINT "Users_username_key" UNIQUE (username);


ALTER TABLE ONLY "Wishlists"
    ADD CONSTRAINT "Wishlists_pkey" PRIMARY KEY (user_id, product_id);


ALTER TABLE ONLY "PurchasedKeys"
    ADD CONSTRAINT "PurchasedKeys_pkey" PRIMARY KEY (sk_id, purchase_id);



	-- Foreign Keys


ALTER TABLE ONLY "ProductImages"
    ADD CONSTRAINT "ProductImages_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Products"
    ADD CONSTRAINT "Products_seller_id_fkey" FOREIGN KEY (seller_id) REFERENCES "Sellers"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Purchases"
    ADD CONSTRAINT "Purchases_buyer_id_fkey" FOREIGN KEY (buyer_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Reviews"
    ADD CONSTRAINT "Reviews_purchase_id_fkey" FOREIGN KEY (sk_id) REFERENCES "SerialKeys"(sk_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Sellers"
    ADD CONSTRAINT "Sellers_user_id_fkey" FOREIGN KEY (user_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "SerialKeys"
    ADD CONSTRAINT "SerialKeys_owner_id_fkey" FOREIGN KEY (owner_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "SerialKeys"
    ADD CONSTRAINT "SerialKeys_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Tags"
    ADD CONSTRAINT "Tags_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Wishlists"
    ADD CONSTRAINT "Wishlists_product_id_fkey" FOREIGN KEY (product_id) REFERENCES "Products"(product_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "Wishlists"
    ADD CONSTRAINT "Wishlists_user_id_fkey" FOREIGN KEY (user_id) REFERENCES "Users"(user_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "PurchasedKeys"
    ADD CONSTRAINT "PurchasedKeys_sk_id_fkey" FOREIGN KEY (sk_id) REFERENCES "SerialKeys"(sk_id) ON UPDATE CASCADE;


ALTER TABLE ONLY "PurchasedKeys"
    ADD CONSTRAINT "PurchasedKeys_user_id_fkey" FOREIGN KEY (purchase_id) REFERENCES "Purchases"(purchase_id) ON UPDATE CASCADE;
