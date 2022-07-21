-- 1. Создать запрос, который будет считать количество
-- существующих продуктов.
select count(p.id)
from product as p;
-- 2. Создать запрос, который будет считать количество
-- продуктов для одной категории.
select count(p.id)
from category as c,
    product as p
where p.idCategory = c.id
    and c.id = 2;
-- 3. Создать запрос, который выведет среднее значение
-- цены всех продуктов.
select avg(p.price)
from product as p;
-- 4. Создать запрос, который будет выводить самый до-
-- рогой продукт.
select max(p.price)
from product as p;
-- 5. Создать запрос, который выведет категорию с наи-
-- меньшим количеством продуктов.
select distinct c.name,
    count(p.id)
from category as c,
    product as p
where p.idCategory = c.id
GROUP BY (c.id)
order by count(p.id) asc
limit 1;
-- 6. Создать запрос, который выведет категорию с самым
-- дорогим продуктом.
select distinct c.name,
    max(p.price)
from category as c,
    product as p
where p.idCategory = c.id
group by (c.id)
limit 1;
-- 7. Создать запрос, который будет считать разницу в цене
-- между самым дорогим и самым дешевым продуктом.
select (max(p.price) - min(p.price)) as `difference`
from product as p;
-- 8. Создать запрос, который выведет общую цену всех
-- продуктов.
select sum(p.price) as `sum`
from product as p;
-- 9. Создать запрос, который выведет количество катего-
-- рий, в которых нет ни одного продукта, и отсортирует
-- их по названию.
select distinct c.name
from category as c
where c.id not in (
        select c.id
        from category as c,
            product as p
        where p.idCategory = c.id
    );
-- 10. Создать запрос, который выведет среднюю цену всех
-- товаров, которые относятся к категории с наибольшим
-- количеством продуктов.
select avg(p.price) as average,
    count(p.id) as `count`,
    c.name
from product as p,
    category as c
where p.idCategory = c.id
group by c.id
order by count(p.id) desc
limit 1;