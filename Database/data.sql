drop database if exists PHP_PROJECT;
create database if not exists PHP_PROJECT;
USE PHP_PROJECT;

create table TYPE_PRODUCT (
    id_type_product int primary key auto_increment,
    name_type varchar(100) 
);

insert into TYPE_PRODUCT ( id_type_product, name_type) values
(1,'Stupffed animal');
insert into TYPE_PRODUCT (name_type) values
('Teddy');
insert into TYPE_PRODUCT (name_type) values
('Cat');
insert into TYPE_PRODUCT ( name_type) values
('Doaremon');

create table PRODUCT (
	id_product int primary key auto_increment,
    name_product varchar (50),
    id_type_product int,
    image1 varchar (200),
    image2 varchar (200),
    image3 varchar (200),
    sale double,
    like_product int,
    descriptions varchar(30),
    foreign key (id_type_product) references TYPE_PRODUCT (id_type_product)
    );

insert into PRODUCT (id_product,name_product,id_type_product,image1,image2,image3,sale,like_product )
 values(1, 'STRIPED BUFFALO SHIRT','1','image/gauTrauAoKe1.jpg','image/gauTrauAoKe2.jpg','image/gauTrauAoKe3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values 
('BUFFALO NECK PILLOWS','1','image/gauCoTrau.jpg','image/gauCoTrau2.jpg','image/gauCoTrau3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ( 'Dinosaur teddy bear','1','image/khungLong1.jpg','image/khungLong2.jpg','image/khungLong3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('TEDDY BEAR CREAM CAKE','2','image/gauTrauAoKe1.jpg','image/teddy4.jpg','image/teddy5.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('TEDDY ANGEL PINK','2','image/teddyHong1.jpg1','image/teddyHong2.jpg','image/teddyHong3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('TEDDY ANGEL PINK','2','image/td3_1.jpg','image/td3_2.jpg','image/td3_3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('TEDDY','2','image/td4-1.jpg','image/td4-2.jpg','image/td4-3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('cute cat','3','image/meo2.jpg','image/meo4.jpg','image/meo5.jpg",',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('cute cat baby','3','image/smallCat1.jpg','image/smallCat2.jpg','image/smallCat3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('Black cat','3','image/blackCat.jpg','image/blackCat2.jpg','img3: "image/blackCat3.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('Cute doremon','4','image/doremon1.jpg','image/bigDoremon.jpg','image/bigDoremon1.jpg',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('Doremon baby','4','image/doremondai1.jpg','image/doremondai2.jpg','image/doremondai3.jpg",',10,1);
insert into PRODUCT (name_product,id_type_product,image1,image2,image3,sale,like_product ) values
 ('Cute doremon baby','4','image/doremontt1.jpg','image/doremontt2.jpg','image/doremontt3.jpg"',10,1);


create table SIZE (
	id_size int primary key auto_increment,
	name_size varchar(100)
);

insert into SIZE (id_size, name_size) values
(1,'size1');
insert into SIZE (id_size, name_size) values
(2,'size2');
insert into SIZE (id_size, name_size) values
(3,'size3');

create table PRODUCT_SIZE (
	id_product_size int primary key auto_increment,
	id_product int,
    id_size int,
    price double,
    quantity int,
    foreign key (id_product) references PRODUCT(id_product),
    foreign key (id_size) references SIZE(id_size)
    );
insert into PRODUCT_SIZE (id_product_size, id_product, id_size, price, quantity) 
                        values
                        (1,1,1,100000,199);

insert into PRODUCT_SIZE (id_product_size, id_product, id_size, price, quantity) 
                        values
                        (2,1,2,120000,54);

insert into PRODUCT_SIZE (id_product_size, id_product, id_size, price, quantity) 
                        values
                        (3,1,3,150000,94);
--------------------------------------------------------
insert into PRODUCT_SIZE (id_product_size, id_product, id_size, price, quantity) 
                        values
                        (4,2,1,100000,199);

insert into PRODUCT_SIZE (id_product_size, id_product, id_size, price, quantity) 
                        values
                        (5,2,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product_size, id_product, id_size, price, quantity) 
                        values
                        (6,2,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (3,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (3,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (3,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (4,1,100000,179);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (4,2,120000,545);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (4,3,150000,934);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (5,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (5,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (5,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (6,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (6,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (6,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (7,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (7,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (7,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (8,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (8,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (8,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (9,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (9,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (9,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (10,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (10,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (10,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (11,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (11,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (11,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (12,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (12,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (12,3,150000,94);
---------------------------------------------------------
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (13,1,100000,199);

insert into PRODUCT_SIZE ( id_product, id_size, price, quantity) 
                        values
                        (13,2,120000,54);
                        
insert into PRODUCT_SIZE (id_product, id_size, price, quantity) 
                        values
                        (13,3,150000,94);
---------------------------------------------------------
create table USERS (
	id_user int primary key auto_increment,
    user_name varchar (20),
    full_name varchar (40),
    passwords varchar(20),
    email varchar (200),
    phone int ,
    address varchar (50),
    balance double
    );

insert into USERS (id_user,user_name,full_name,passwords,email,phone, address, balance) values
 (1, 'admin','adminstrator','1234567','tuan.pham22@student.passerellesnumeriques.org',0915810375,'DANANG',200000);
insert into USERS (user_name,full_name,passwords,email,phone, address, balance) values
 ('Kha','Nguyen Dinh kha','kha1234567','kha.nguyen22@student.passerellesnumeriques.org',0915810375,'DANANG',200000);
insert into USERS (user_name,full_name,passwords,email,phone, address, balance) values
 ('Hoa','Nguyen Thi Hoa','hoa1234567','hoa.nguyen22@student.passerellesnumeriques.org',0915810375,'DANANG',200000);
insert into USERS (user_name,full_name,passwords,email,phone, address, balance) values
 ('Dieu','Ho Thi Dieu','dieu1234567','dieu.ho22@student.passerellesnumeriques.org',0915810375,'DANANG',200000);
insert into USERS (user_name,full_name,passwords,email,phone, address, balance) values
 ('Bang','Gia Cao Bang','bang1234567','bang.gia22@student.passerellesnumeriques.org',0915810375,'DANANG',200000);

    
create table CARTS_DETAIL (
	id_cart int primary key auto_increment,
	id_user int,
    id_product_size int ,
    quantity int ,
    total double,
    foreign key (id_user) references USERS (id_user),
    foreign key(id_product_size) references PRODUCT_SIZE (id_product_size)
    );

insert into CARTS_DETAIL (id_cart, id_user, id_product_size, quantity, total) values
(1,1,1,1,1);
insert into CARTS_DETAIL (id_user, id_product_size, quantity, total) values
(2,2,2,2);
insert into CARTS_DETAIL (id_user, id_product_size, quantity, total) values
(3,3,3,3);
insert into CARTS_DETAIL (id_user, id_product_size, quantity, total) values
(4,4,4,4);
insert into CARTS_DETAIL (id_user, id_product_size, quantity, total) values
(5,5,5,5);
    
create table PAID (
    id_paid INT primary key auto_increment,
    id_user int,
    id_product_size int ,
    quantity int ,
    total double,
    foreign key (id_user) references USERS (id_user),
    foreign key(id_product_size) references PRODUCT_SIZE (id_product_size)
);

insert into PAID (id_paid, id_user,id_product_size,quantity,total) values
 (1,1,1,3,360000);
insert into PAID (id_user,id_product_size,quantity,total) values
 (2,1,3,360000);
insert into PAID (id_user,id_product_size,quantity,total) values
 (3,2,3,160000);
insert into PAID (id_user,id_product_size,quantity,total) values
 (4,3,3,560000);
 
 select * from PAID;
 select * from USERS;

    