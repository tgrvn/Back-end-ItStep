-- 1. Добавить такие поля для каждой из таблиц:
-- a) User: добавить поля Surname (Text), Login (text),
-- Password (text), Phone (text), Country (text), City (text).
ALTER TABLE user
ADD surname varchar(100);
ALTER TABLE user
ADD login varchar(100);
ALTER TABLE user
ADD password varchar(100);
ALTER TABLE user
ADD phone varchar(100);
ALTER TABLE user
ADD country varchar(100);
ALTER TABLE user
ADD city varchar(100);
-- b) Product: Description (text), Make (text), Model (text),
-- Country (text).
ALTER TABLE product
ADD description varchar(100);
ALTER TABLE product
ADD make varchar(100);
ALTER TABLE product
ADD model varchar(100);
ALTER TABLE product
ADD country varchar(100);
-- c) Category: idSector (Int not null).
ALTER TABLE category
ADD idSector int not null;
-- 2. Создать табличку Sector с полями: id (int not null primary
-- key), Name. Поле id связать с полем idSector таблицы
-- Category.
create table sector (
    id int primary key auto_increment,
    name nvarchar(100) foreign key (id) references category(idSector)
);
ALTER TABLE category
ADD CONSTRAINT fk_id_sector FOREIGN KEY (idSector) REFERENCES sector(sector_id);
-- 3. Обновить данные в БД в соответствии с новой струк-
-- турой.
-- import bd_hw_17.sql с новыми данными
-- 4. Написать запрос, который будет выводить инфор-
-- мацию о продуктах, которые принадлежат одному
-- сектору (сгруппировать продукты по категориям).
select *
from sector as s
    JOIN category as c on s.sector_id = c.idSector
    JOIN product as p on p.idCategory = c.id
group by p.name
ORDER by s.name;
-- 5. Вывести информацию о наиболее популярном секторе
-- (тот, продукты из которого больше всего покупались).
select COUNT(p.id) as `buyed products`,
    s.name
from sector as s
    JOIN category as c on s.sector_id = c.idSector
    JOIN product as p on p.idCategory = c.id
    JOIN cart as ca on p.id = ca.pdouctId
group by s.name
ORDER by count(p.id) DESC
limit 1;
-- 6. Вывести информацию о пользователях, которые поль-
-- зуются продуктами из сектора.
select u.name as `username`,
    p.name as `product name`,
    s.name as `sector name`
from sector as s
    JOIN category as c on s.sector_id = c.idSector
    JOIN product as p on p.idCategory = c.id
    JOIN cart as ca on p.id = ca.pdouctId
    JOIN `user` as u on u.id = ca.userId;
-- 7. Посчитать количество продуктов в каждой категории
-- и вывести его.
select c.name,
    COUNT(p.id) as `products count`,
    p.*
from category as c
    JOIN product as p on p.idCategory = c.id
GROUP BY c.name;
-- 8. Отсортировать категории по возрастанию цены на
-- продукты, которые к ней относятся.
select SUM(p.price) as `category product price sum`,
    c.name as `category name`
from product as p
    JOIN category as c on p.idCategory = c.id
GROUP BY c.name
ORDER by `category product price sum`;
-- 9. Посчитать среднее значение цены на продукты для
-- каждой категории.
select AVG(p.price) as `category product price sum`,
    c.name as `category name`
from product as p
    JOIN category as c on p.idCategory = c.id
GROUP BY c.name
ORDER by `category product price sum`;
-- 10. Вывести информацию о пользователях, которые по-
-- купали продукты только из одной категории, вывести
-- дорогой продукт, который они покупали, и посчитать
-- количество этого продукта.
SELECT u.name as `username`,
    p.name as `product name`
FROM user as u
    JOIN cart as ca on ca.userId = u.id
    JOIN product as p on p.id = ca.pdouctId
    JOIN category as c on c.id = p.idCategory
where p.id = (
        SELECT pp.id
        from product as pp
        WHERE pp.idCategory = c.id and pp.idCategory = 2
        ORDER by pp.price desc limit 1
    );