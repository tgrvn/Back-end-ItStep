-- 1. Создать запрос, который выведет количество поль-
-- зователей.
select count(u.id) as `users count`
from user as u;
-- 2. Создать запрос, который вернет количество продуктов
-- в корзине для одного пользователя.
select u.name,
    count(p.name) as `product count`
from user as u,
    product as p,
    cart as c
where p.id = c.pdouctId
    and u.id = 2
    and u.id = c.userId;
-- 3.Создать запрос,
-- который посчитает общую стоимость продуктов в корзине.
select avg(p.price)
from product as p,
    cart as c
where p.id = c.pdouctId;
-- 5. Создать запрос, который посчитает количество каж-
-- дого продукта в корзине для одного пользователя.
select u.name,
    sum(p.price) as `price sum`
from user as u,
    cart as c,
    product as p
where c.userId = u.id
    and c.pdouctId = p.id
group by u.name;
-- 6. Создать запрос, который выберет 3 самых дорогих
-- продукта, которые все пользователи наибольшее ко-
-- личество раз клали в корзину.
select p.name,
    p.price,
    count(p.name) as `product count`
from product as p,
    cart as c,
    user as u
where c.pdouctId = p.id
    and u.id = c.userId
group by u.name
order by COUNT(p.name) desc
limit 3;
-- 7. Создать запрос, который отсортирует все продукты
-- в корзине по количеству записей в корзине для всех
-- пользователей.
select p.name,
    p.price,
    count(p.name) as `product count`
from product as p,
    cart as c,
    user as u
where c.pdouctId = p.id
    and u.id = c.userId
group by u.name
order by COUNT(p.name) desc;
-- 8. Создать запрос, который выведет пользователей, ко-
-- торые ничего не купили.
select u.name
from user as u,
    cart as c
where u.id not in (
        select u.id
        from cart as c,
            user as u
        where c.userId = u.id
    )
group by u.id;
-- 9. Создать запрос, который выведет пользователя, ко-
-- торый купил наибольшее количество одинаковых
-- продуктов.
select u.name,
    count(p.id)
from user as u,
    product as p,
    cart as c
where u.id = c.userId
    and p.id = c.pdouctId
group by u.name;
-- 10.Создать запрос,
-- который найдет самый дешевый про - дукт,
-- найдет всех пользователей,
-- которые покупали этот продукт,
-- посчитает количество продуктов и вы - ведет общую цену всех продуктов.
select u.name,
    (
        select min(p.price)
        from product as p
    ) as `chipest`,
    (
        select count(p.id)
        from product as p
    ) as `product count`,
    (
        select sum(p.price)
        from product as p
    ) as `all price`
from cart as c,
    user as u,
    product as p
where p.id = c.pdouctId
    and u.id = c.userId
group by p.price
limit 1;