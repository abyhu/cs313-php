CREATE TABLE products (
	ID			SERIAL PRIMARY KEY, 
	name			varchar(80), 
	img_url			varchar(80), 
	description		varchar(500), 
	price			double precision,
	quantity		int
);

CREATE TABLE customers (
	ID			SERIAL PRIMARY KEY, 
	last_name		varchar(20),
	first_name 		varchar(20), 
	street_address		varchar(80), 
	city			varchar(30), 
	state			varchar(2),
	zip			int, 
	phone			varchar(10)
);

CREATE TABLE orders (
	ID			SERIAL PRIMARY KEY, 
	customer_id		int references customers(ID), 
	credit_card_num		varchar(16), 
	expiration		varchar(8), 
	card_type		varchar(20),
	total			double precision,
	shipping_status		boolean
);

CREATE TABLE orders_products (
	order_id		int references orders(ID), 
	product_id		int references products(ID)
);

INSERT INTO products (name, img_url, description, price, quantity)                 
VALUES ('Oh So Retro Traveler Purse', 'images/purse0med.jpg', 'This vintage style purse is a new twist on an old classic. Embossed leather creates a feminine look. The soft camel color and honey highlights make the purse a staple for any closet. Extra large pockets, a sturdy zipper, and an over the shoulder strap give the fashionable purse function.', 50.00, 10);       

INSERT INTO products (name, img_url, description, price, quantity) 
VALUES ('Pinch of Punk Purse', 'images/purse1med.jpg', 'This purse is tough. Sturdy leather with gold studs and hardware add character. This purse includes a matching coin purse and features an interior pocket large enough to fit a standard tablet. When you need something edgy to coordinate with your look, this purse is the one.', 45.00, 10);

INSERT INTO products (name, img_url, description, price, quantity) 
VALUES ('Hollywood Glam Purse', 'images/purse2med.jpg', 'Every girl needs some bling and this purse is reminiscent of the Hollywood starlet. It features a delicate rhinestone strap, a zipper and three interior pockets. This purse may look small, but she packs all your date night essentials with room to spare.', 35.00, 10);

INSERT INTO products (name, img_url, price, quantity) 
VALUES ('Bohemian Handcrafted Bag', 'images/purse3.med.jpg', 40.00, 10);

INSERT INTO products (name, img_url, price, quantity) 
VALUES ('City Commuter Purse', 'images/purse4med.jpg', 60.00, 10); 

INSERT INTO products (name, img_url, price, quantity) 
VALUES ('Cherry On Top Handbag', 'images/purse5med.jpg', 30.00, 10);

INSERT INTO products (name, img_url, price, quantity) 
VALUES ('Little Black Pocketbook', 'images/purse6med.jpg', 25.00, 10); 

INSERT INTO products (name, img_url, price, quantity) 
VALUES ('International Traveler Purse', 'images/purse7med.jpg', 55.00, 10);

INSERT INTO products (name, img_url, price, quantity)
VALUES ('Essential Clutch', 'images/purse8med.jpg', 20.00, 10);

INSERT INTO customers (last_name, first_name, street_address, city, state, zip, phone) 
VALUES ('Hunter', 'Aby', '123 W 456 N', 'Tremonton', 'UT', 84337, '3212345678');

INSERT INTO orders (customer_id, credit_card_num, expiration, card_type) 
VALUES (1, '3434343434343434', 'May 2020', 'Mastercard');

INSERT INTO orders_products (order_id, product_id) 
VALUES (1, 1);

INSERT INTO orders_products (order_id, product_id) 
VALUES (1, 4);

















