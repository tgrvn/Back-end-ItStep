-- PRACTIC
-- 1. Создать базу данных "Shop" в БД создать табличку
-- Product с полями id (int not null primary key) Name
-- (text) Price (int).
create database if not exists Shop;
use Shop;
drop table if exists product;
create table product(
    id int PRIMARY KEY auto_increment,
    name nvarchar(100),
    price int
);
-- 2. Написать запрос для добавления продуктов в табличку
-- (добавить 10 продуктов).
insert INTO product (name, price)
VALUES ("iphone 10 xr", "400"),
    ("iphone 10 xs", "450"),
    ("iphone 10 xs max", "600"),
    ("iphone 11 xr", "620"),
    ("iphone 11 xs", "640"),
    ("iphone 11 xs max", "690"),
    ("ipad air 4", "800"),
    ("ipad air 5", "910"),
    ("apple mackbook", "1000"),
    ("apple mackbook pro", "1200");
-- 3. Написать запросы для вывода:
-- a) Всех продуктов;
select *
from product;
-- b) Продуктов, цена которых выше 10;
select *
from product
where price > 650;
-- c) Продуктов, цена которых больше 5 и меньше 20;
select *
from product
where price > 400
    and price < 800;
-- d) Продуктов, которые начинаются на букву A;
select *
from product
where name like "a%";
-- e) Всех продуктов, отсортированных по возрастанию цены.
select *
from product
order by price;
-- 4. Написать запрос, который позволит поменять цену продукта.
update product
set price = 800
WHERE id = 7;
-- 5. Создать табличку Category с полями id (int not null
-- primary key), Name (text).
drop table if exists category;
create table category(
    id int PRIMARY KEY auto_increment,
    name nvarchar(100)
);
-- 6. Написать запросы для вывода:
-- a) Всех категорий;
select *
from category;
-- b) Категорий, отсортированных по возрастанию;
select *
from category
order by name;
-- c) Категорий, отсортированных по id по убыванию.
select *
from category
order by id desc;
-- 7. Написать запрос для добавления категорий в таблич-
-- ку Category.
insert INTO category (name)
VALUES ("laptop"),
    ("phone"),
    ("tablet");
-- 8. В табличку Product добавить поле idCategory ко-
-- торое будет внешним ключом к табличке Category
-- по полю id.
alter table product
add column idCategory int;
alter TABLE product
add CONSTRAINT fk_idCategory foreign key (idCategory) references category(id);
-- 9. Обновить все записи в табличке Product (добавить
-- в поле idCategory значение категории).
update product
set idCategory = 2
where name like "iphone%";
update product
set idCategory = 3
where name like "ipad%";
update product
set idCategory = 1
where name like "%mackbook%";
-- 10. Написать скрипты для вывода:
-- a) Всех продуктов с категориями;
select product.id,
    product.name,
    product.price,
    category.name
from product,
    category
where product.idCategory = category.id;
-- b) Продуктов только одной категории;
select product.id,
    product.name,
    product.price,
    category.name
from product,
    category
where product.idCategory = category.id
    and product.idCategory = 3;
-- c) Продуктов, не имеющих категории.
select product.id,
    product.name,
    product.price,
    category.name
from product,
    category
where product.idCategory = category.id
    and product.idCategory = null;
-- HOMEWORK
-- 1. Создать табличку Cart с полями userId (int not null),
-- productId (int not null). Поле productId связать внеш-
-- ним ключом с полем id таблички Product.
-- Пример схемы:
create table cart (
    id int PRIMARY KEY auto_increment,
    userId int not null,
    pdouctId int not null
);
alter TABLE cart
add CONSTRAINT fk_pdouctId foreign key (pdouctId) references product(id);
-- 2. Создать табличку User с полями id (int not null primary
-- key), Name (text). Поле id связать внешним ключом с
-- полем userId таблички Cart.
create table `user` (
    id int PRIMARY KEY auto_increment,
    name VARCHAR(100)
);
alter TABLE cart
add CONSTRAINT fk_userId foreign key (userId) references user(id);
-- 3. Написать запрос вставки данных в табличку User.
-- Использовать запрос 10 раз.
insert INTO user (name)
VALUES ("Hanna"),
    ("Leyla"),
    ("Anatolyi"),
    ("Andrey"),
    ("Viktoria"),
    ("Pavel"),
    ("Max"),
    ("Sergey"),
    ("Irina");
-- 4. Написать запрос вставки данных в табличку Cart.
-- Использовать запрос 10 раз.
insert into cart (userId, pdouctId)
VALUES (1, 2),
    (2, 3),
    (3, 4),
    (4, 5),
    (5, 6),
    (6, 7),
    (7, 8),
    (8, 9),
    (9, 10),
    (10, 7);
-- 5. Написать запросы для вывода:
-- a) Всех пользователей;
select id,
    name
from user;
-- b) Всех записей в корзине (выводить всю информацию
-- о пользователе, всю информацию о продукте, всю
-- информацию о категории);
select *
FROM user,
    category,
    product,
    cart
where cart.userId = user.id
    and cart.pdouctId = product.id
    and category.id = product.idCategory;
-- c) Все записи в корзине (вывести имя пользователя,
-- название категории и название продукта);
select user.name,
    category.name,
    product.name
from cart,
    user,
    product,
    category
where cart.userId = user.id
    and cart.pdouctId = product.id
    and category.id = product.idCategory;
-- d) Всех продуктов, выбранных в корзине одним поль-
-- зователем (выводить всю информацию о пользо-
-- вателе, продукт и категорию);
select cart.id,
    user.name,
    product.name,
    category.name
from cart,
    user,
    product,
    category
where cart.userId = user.id
    and cart.pdouctId = product.id
    and category.id = product.idCategory
    and user.id = 1;
-- e) Названий категорий, продукты которых добавлены
-- в корзину одним пользователем;
select user.name,
    category.name,
    product.name
from cart,
    user,
    category,
    product
where cart.userId = user.id
    and cart.pdouctId = product.id
    and category.id = product.idCategory
    and user.id = 3;
-- f) Информацию о всех пользователях, которые купили
-- один продукт;
select user.id,
    user.name,
    product.name
from cart,
    user,
    category,
    product
where cart.userId = user.id
    and cart.pdouctId = product.id
    and category.id = product.idCategory
    and product.id = 4;
-- g) Информацию о категории, продуктов которой нет
-- у пользователя в корзине.
select user.id,
    user.name,
    category.name,
    product.name
from cart,
    user,
    category,
    product
where cart.userId != user.id
    and cart.pdouctId = product.id
    and category.id = product.idCategory
    and user.id = 4;