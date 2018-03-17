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
	"state" ENUM("Active","Inactive","Banned","Blocked") DEFAULT "Active" NOT NULL ,
	"admin" BOOLEAN DEFAULT FALSE NOT NULL,
	img VARCHAR
);


CREATE TABLE Sellers
(
	user_id SERIAL FOREIGN KEY REFERENCES Users(user_id),
	professional_email VARCHAR NOT NULL UNIQUE,
	professional_name VARCHAR NOT NULL UNIQUE,
	professional_phone INTEGER NOT NULL
);


CREATE TABLE Products
(
	product_id SERIAL NOT NULL UNIQUE PRIMARY KEY,
	seller_id SERIAL FOREIGN KEY REFERENCES Users(user_id),
	description VARCHAR NOT NULL,
	release_date TIMESTAMP WITH TIME ZONE DEFAULT now() NOT NULL,
	operating_system VARCHAR NOT NULL,
	price DOUBLE NOT NULL,
	logo VARCHAR NOT NULL
);


CREATE TABLE ProductImages
(
	product_id SERIAL FOREIGN KEY REFERENCES Products(product_id),
	image_path VARCHAR NOT NULL
);


CREATE TABLE Wishlist
(
	user_id SERIAL FOREIGN KEY REFERENCES Users(user_id),
	product_id SERIAL FOREIGN KEY REFERENCES Products(product_id)
);

