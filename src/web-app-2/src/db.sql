create table users(
id bigserial NOT NULL primary key,
name VARCHAR(50) NOT NULL,
email VARCHAR(70) NOT NULL,
pass VARCHAR(100) NOT NULL);


create table products(
pid bigserial NOT NULL primary key,
p_name VARCHAR(50) NOT NULL,
p_vendor VARCHAR(50) NOT NULL,
p_model VARCHAR(50) NOT NULL,
p_price INTEGER NOT NULL CHECK(p_price > 0),
p_discount INTEGER NOT NULL CHECK(p_discount < p_price AND p_discount >= 0),
img_location varchar(255) default 'img-default-1.jpg',
p_last_update TIMESTAMP);


CREATE TYPE order_status AS ENUM ('Added to cart', 'Confirmed');
create table orders(
order_id bigserial NOT NULL PRIMARY KEY,
user_id INTEGER,
product_id INTEGER,
order_status order_status,
order_date TIMESTAMP,
CONSTRAINT fk_users FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_products FOREIGN KEY (product_id) REFERENCES products(pid));

CREATE table transation_detail(
tid BIGSERIAL NOT NULL PRIMARY KEY,
user_id INTEGER,
order_id INTEGER,
product_id INTEGER,
transaction_date TIMESTAMP,
CONSTRAINT fk_uid FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_oid FOREIGN KEY (order_id) REFERENCES orders(order_id),
CONSTRAINT fk_pid FOREIGN KEY (product_id) REFERENCES products(pid)
);

CREATE table transaction_summary(
ts_id BIGSERIAL NOT NULL PRIMARY KEY,
user_id INTEGER,
total_amount INTEGER,
transaction_date TIMESTAMP,
CONSTRAINT fk_uid FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE admins(
admin_id VARCHAR(100) NOT NUll PRIMARY KEY,
admin_number INTEGER NOT NULL,
admim_role VARCHAR(50)
);
/*
insert into 
select it.pid,it.p_name,it.p_price from orders ut inner join products it on it.pid=ut.product_id where ut.user_id=1;
select ab.pid,ab.p_name,ab.p_price from orders bc inner join products ab on ab.pid=bc.product_id where bc.user_id=1;
select khinwintwa.pid,khinwintwa.p_name,khinwintwa.p_price from orders kowintun inner join products khinwintwa on khinwintwa.pid=kowintun.product_id where kowintun.user_id=1;
select KhinWintWa.pid,KhinWintWa.p_name,KhinWintWa.p_price from orders KoWinTun inner join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
select KhinWintWa.pid,KhinWintWa.p_name,KhinWintWa.p_price from orders KoWinTun left join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
select KhinWintWa.pid,KhinWintWa.p_name,KhinWintWa.p_price,KoWinTun.order_status from orders KoWinTun right join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
select KhinWintWa.pid,KhinWintWa.p_name,KhinWintWa.p_price,KoWinTun.order_status from orders KoWinTun inner join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
select KhinWintWa.pid,KhinWintWa.p_name,KhinWintWa.p_price,KoWinTun.order_status from orders KoWinTun inner join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
select KhinWintWa.pid,KhinWintWa.p_name,KhinWintWa.p_price,KoWinTun.order_status,KoWinTun.order_date from orders KoWinTun inner join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
select * from orders KoWinTun inner join products KhinWintWa on KhinWintWa.pid=KoWinTun.product_id where KoWinTun.user_id=1;
*/






