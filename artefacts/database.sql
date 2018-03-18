CREATE TABLE Users 
(
	user_id SERIAL NOT NULL UNIQUE PRIMARY KEY,
	username VARCHAR NOT NULL UNIQUE,
	password VARCHAR NOT NULL,
	fullname VARCHAR,
	email VARCHAR NOT NULL UNIQUE,
	phone_number INTEGER,
	birth_date TIMESTAMP WITH TIME ZONE NOT NULL,
	adminssion_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
	"state" ENUM("Active","Inactive","Banned","Blocked") DEFAULT "Active" NOT NULL,
	"admin" BOOLEAN DEFAULT FALSE NOT NULL,
	img VARCHAR
);


CREATE TABLE Sellers
(
	user_id SERIAL NOT NULL UNIQUE FOREIGN KEY REFERENCES Users(user_id),
	professional_email VARCHAR NOT NULL UNIQUE,
	professional_name VARCHAR NOT NULL UNIQUE,
	professional_phone INTEGER NOT NULL
);


CREATE TABLE Buyers
(
	user_id SERIAL NOT NULL UNIQUE FOREIGN KEY REFERENCES Users(user_id)
);


CREATE TABLE Products
(
	product_id SERIAL NOT NULL UNIQUE PRIMARY KEY,
	seller_id SERIAL NOT NULL FOREIGN KEY REFERENCES Sellers(user_id),
	description VARCHAR NOT NULL,
	release_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
	operating_system VARCHAR NOT NULL,
	price DOUBLE NOT NULL CHECK (price >= 0.),
	logo VARCHAR NOT NULL
);


CREATE TABLE ProductImages
(
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id),
	image_path VARCHAR NOT NULL
);


CREATE TABLE Wishlist
(
	user_id SERIAL NOT NULL FOREIGN KEY REFERENCES Users(user_id),
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id)
);


CREATE TABLE Tags
(
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id),
	tag_name VARCHAR NOT NULL
);


CREATE TABLE Discounts
(
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id),
	discounted_price DOUBLE NOT NULL CHECK (discounted_price >= 0.),
	begin_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
	end_date TIMESTAMP WITH TIME ZONE NOT NULL CHECK (end_date > begin_date)
);


CREATE TABLE SerialKeys
(
	owner_id SERIAL NOT NULL FOREIGN KEY REFERENCES Users(user_id),
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id),
	serial_key VARCHAR NOT NULL UNIQUE PRIMARY KEY
);


CREATE TABLE Purchases
(
	purchase_id SERIAL NOT NULL UNIQUE PRIMARY KEY,
	final_price DOUBLE NOT NULL,
	buyer_id SERIAL NOT NULL FOREIGN KEY REFERENCES Users(user_id),
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id),
	serial_key VARCHAR NOT NULL UNIQUE FOREIGN KEY REFERENCES SerialKeys(serial_key)
);


CREATE TABLE Reviews
(
	purchase_id SERIAL NOT NULL UNIQUE FOREIGN KEY REFERENCES Purchases(purchase_id),
	product_id SERIAL NOT NULL FOREIGN KEY REFERENCES Products(product_id),
	user_id SERIAL NOT NULL FOREIGN KEY REFERENCES Users(user_id),
	rating INTEGER NOT NULL,
	"comment" VARCHAR NOT NULL
);

CREATE TABLE PurchasePayments
(
	purchase_id SERIAL NOT NULL UNIQUE FOREIGN KEY REFERENCES Purchases(purchase_id),
	transaction_id SERIAL NOT NULL FOREIGN KEY REFERENCES Payments(transaction_id)
);

CREATE TABLE Payments
(
	transaction_id SERIAL NOT NULL UNIQUE PRIMARY KEY,
	paid_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
	"method" ENUM("Credit Card","PayPal","Banking Transfer") NOT NULL,
	total DOUBLE NOT NULL,
	details VARCHAR
);
