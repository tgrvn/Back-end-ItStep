-- 1. Создать запрос, который будет выводить данные из
-- корзины, сгруппировать по сектору и категории.
select sum(p.price) as `product price sum`,
    c.name as `category`,
    s.name as `sector name`,
    count(p.id) as `product count`
from cart as ca
    JOIN user as u on u.id = ca.userId
    JOIN product as p on p.id = ca.pdouctId
    JOIN category as c on c.id = p.idCategory
    JOIN sector as s on s.sector_id = c.idSector
GROUP by s.sector_id,
    c.id;
-- 2. Вывести список пользователей, которые пользовались
-- продуктами только одного сектора.
select u.name,
    s.name,
    p.name
from cart as ca
    JOIN user as u on u.id = ca.userId
    JOIN product as p on p.id = ca.pdouctId
    JOIN category as c on c.id = p.idCategory
    JOIN sector as s on s.sector_id = c.idSector
GROUP by p.name
ORDER by s.name;
-- 3. Вывести информацию о категории (имя, имя сектора,
-- id).
select c.id,
    c.name,
    s.name
from category as c
    join sector as c on s.sector_id = c.idSector
group by c.id;
-- 4. Вывести количество пользователей, которые пользо-
-- вались продуктами каждой категории.
select c.name as `category`,
    count(u.id) as `username`
from cart as ca
    JOIN user as u on u.id = ca.userId
    JOIN product as p on p.id = ca.pdouctId
    JOIN category as c on c.id = p.idCategory
GROUP by c.name
order by count(u.id);
-- 5. Вывести самый популярный продукт каждой кате-
-- гории.
SELECT p.name AS `product`, c.name AS `category`
FROM product as p
JOIN category as c on c.id = p.idCategory
WHERE p.id = (
	SELECT p2.id from product as p2
    JOIN cart as ca on p2.id = ca.pdouctId
    JOIN category as c2 on c2.id = p2.idCategory
    WHERE c2.id = c.id
    GROUP BY p2.id
    ORDER BY COUNT(p2.id) DESC
    LIMIT 1
);
-- 6. Вывести самый дешевый продукт каждой категории,
-- отсортировать по убыванию цены и вывести инфор-
-- мацию о том, сколько раз пользователи положили
-- его в корзину.
SELECT p.name as `product`, COUNT(u.id) AS `byed`, c.name AS `category`
FROM product as p
JOIN category as c on c.id = p.idCategory
JOIN cart as ca on ca.pdouctId = p.id
JOIN user as u on ca.userId = u.id
WHERE p.id = (
SELECT p2.id
FROM cart as ca2 
JOIN product as p2 on ca2.pdouctId = p2.id
JOIN category as c2 on c2.id = p2.idCategory
WHERE c2.id = c.id
GROUP BY ca2.id
ORDER BY p2.price
LIMIT 1
)
GROUP BY p.name;
-- 7. Вывести пользователей, которые не до конца запол-
-- нили свой профиль.
SELECT u.*
FROM user as u
WHERE u.phone is null or u.country is null or u.city is null;
-- 8. Отсортировать пользователей по возрастанию цены
-- на продукты, которые они добавили в корзину.
SELECT u.name as `user`, p.name as `product`, p.price as `price`
FROM cart as ca
JOIN user as u on ca.userId = u.id
JOIN product as p on ca.pdouctId = p.id
GROUP by ca.id
ORDER by `price`;
-- 9. Вывести пользователей в порядке возрастания по-
-- траченных денег на продукты.
SELECT u.name as `user`, SUM(p.price) as `spend`
FROM cart as ca
JOIN user as u on ca.userId = u.id
JOIN product as p on ca.pdouctId = p.id
GROUP by u.id
ORDER by `spend`;
-- 10. Вывести информацию о продуктах, которые хотя бы
-- раз покупали пользователи, количество покупок, общее
-- количество потраченных денег на продукт, отсорти-
-- ровав количество покупок по возрастанию.
SELECT p.name as `product`, COUNT(p.id) as `byed`, sum(p.price) as `spended`
FROM cart as ca
JOIN product as p on ca.pdouctId = p.id
GROUP by p.name
HAVING `byed` > 1
ORDER BY `spended`;