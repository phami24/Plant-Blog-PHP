CREATE DATABASE garden_world;


USE garden_world;

-- Admin Account 
CREATE TABLE admin 
(
	admin_id int auto_increment primary key,
    username varchar(255),
    password varchar(255)
);

-- Custommers Account

CREATE TABLE custommers 
(
	custommer_id int auto_increment primary key,
	full_name varchar(255),
    username varchar(300),
    password varchar(300),
    email varchar(255),
    phone varchar(255)
);


-- Phân loại sản phẩm
CREATE TABLE product_type
(
	product_type_id int auto_increment primary key,
    product_type_name varchar(255)
);

-- Sản phẩm liên quan
CREATE TABLE product
(
	product_id int auto_increment primary key,
    product_name varchar(255),
    product_imt varchar(255),
    product_type_id int ,
    FOREIGN KEY (product_type_id) REFERENCES product_type(product_type_id)
);


-- Post Category (Loại bài viết)

CREATE TABLE post_category
(
	post_category_id int auto_increment primary key, 
    post_category_name varchar(255)
);

-- Post ( Bài viết )

CREATE TABLE post 
(
	post_id int auto_increment primary key,
    title varchar(255),
    post_img varchar(255),
    post_category_id int ,
    status int,
	FOREIGN KEY (post_category_id) REFERENCES post_category(post_category_id)
);

-- Topics ( Những chủ đề trong bài viết )
CREATE TABLE topics
(
	topic_id int auto_increment primary key,
    topic_name varchar(255),
    content text,
    post_id int,
    product_id int, -- sản phẩm liên quan
    FOREIGN KEY (post_id) REFERENCES post(post_id),
	FOREIGN KEY (product_id) REFERENCES product(product_id)
);

CREATE TABLE topics_img
(
	topic_img_id int auto_increment primary key,
    img_url varchar(255),
    topic_id int ,
    FOREIGN KEY (topic_id) REFERENCES topics(topic_id)
);


CREATE TABLE comments
(
	comment_id int auto_increment primary key ,
    custommer_id int,
    comment text ,
	post_id int,
    created_at DATETIME default CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    FOREIGN KEY (custommer_id) REFERENCES custommers(custommer_id)
);


CREATE VIEW comment_view AS
SELECT  created_at ,full_name , comment 
FROM custommers 
INNER JOIN comments
ON custommers.custommer_id = comments.custommer_id;

DROP VIEW comment_view













