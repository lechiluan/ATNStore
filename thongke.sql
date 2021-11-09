/*Thong ke tong don hang trong thang 11*/
SELECT proname, deliveryloca, qty, totalprice, orderdate FROM product as a, branch as b, orders as c, orderdetail as d
WHERE d.branchid=b.branchid and a.proid = d.proid and c.orderid = d.orderid and date_part('month', orderdate ) = 11

/*Top 10 product best seller*/
SELECT  a.proid,a.proname, c.deliveryloca, d.qty, c.totalprice, c.orderdate FROM product as a, branch as b, orders as c, orderdetail as d
WHERE d.branchid=b.branchid and a.proid = d.proid and c.orderid = d.orderid 
GROUP BY qty,a.proid, a.proname, c.deliveryloca, c.totalprice, c.orderdate
ORDER BY qty DESC
Limit 10


SELECT a.proid, proname, branchname, qty, totalprice, orderdate FROM product as a, branch as b, orders as c, orderdetail as d
WHERE d.branchid=b.branchid and a.proid = d.proid and c.orderid = d.orderid and d.branchid='B01'


SELECT * FROM branch
