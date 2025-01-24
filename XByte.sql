CREATE TABLE orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  order_date DATETIME,
  total DECIMAL(10,2),
  status VARCHAR(20),
  shipping_address TEXT,
  phone VARCHAR(20),
  email VARCHAR(100),
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);
CREATE TABLE order_items (
  order_id INT,
  product_id INT,
  qty INT,
  PRIMARY KEY (order_id, product_id),
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (product_id) REFERENCES items(id)
);
CREATE TABLE client (
  phone INT PRIMARY KEY,
  firstname VARCHAR(100),
  email VARCHAR(100),
  lastname VARCHAR(20),
  address TEXT
);
CREATE TABLE user (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(20),
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  address TEXT
);


