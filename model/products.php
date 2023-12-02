<?php

function insert_products($categories_id, $name, $price, $img, $detail)
{
    $sql = "insert into products(categories_id,name,price,img,detail) values('$categories_id', '$name', '$price', '$img', '$detail' )";
    pdo_execute($sql);
}
function delete_products($id)
{
    $sql = "update products set status = 0 where id =" . $id;
    pdo_execute($sql);
}
function restore_products($id)
{
    $sql = "update products set status = 1 where id =" . $id;
    pdo_execute($sql);
}
function show_news_products()
{
    $sql = "select * from products where status = 1 order by id desc limit 0,4";
    $showproducts = pdo_query($sql);
    return $showproducts;
}
function show_all_products()
{
    $sql = "select * from products where status = 1 order by id desc";
    $showproducts = pdo_query($sql);
    return $showproducts;
}


function load_all_products($kyw = "", $categories_id = 0)
{
    $sql = "select * from products where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($categories_id > 0) {
        $sql .= " and categories_id = '" . $categories_id . "'";
    }
    $sql .= " order by id desc";
    $sql = "select * from products where status = 1 order by id desc";
    $listproducts = pdo_query($sql);
    return $listproducts;
}
function load_deleted_products($kyw = "", $categories_id = 0)
{
    $sql = "select * from products where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($categories_id > 0) {
        $sql .= " and categories_id = '" . $categories_id . "'";
    }
    $sql .= " order by id desc";
    $sql = "select * from products where status = 0 order by id desc";
    $listproducts = pdo_query($sql);
    return $listproducts;
}

function load_one_products($id)
{
    $sql = "select * from products where id=" . $id;
    $products = pdo_query_one($sql);
    return $products;
}
function load_name_categories($categories_id){
    if($categories_id>0){
    $sql="select * from categories where id=".$categories_id;
    $categories=pdo_query_one($sql);
    extract($categories);
    return $name;
}else{
    return "";
}
function load_products_by_categories($id, $categories_id)
{
    $sql = "select * from products where status and categories_id=" . $categories_id . " AND id <> " . $id;
    $listproducts = pdo_query($sql);
    return $listproducts;
}

function update_products($id, $categories_id, $name, $price, $detail, $img)
{
    if ($img != "") {
        $sql = "update products set categories_id='" . $categories_id . "', name='" . $name . "', price='" . $price . "', detail='" . $detail . "', img='" . $img . "'   where id=" . $id;
    } else {
        $sql = "update products set categories_id='" . $categories_id . "', name='" . $name . "', price='" . $price . "', detail='" . $detail . "'   where id=" . $id;
    }
    pdo_execute($sql);
}

function load_product_related($id, $categories_id){
    $sql = "SELECT * FROM products WHERE categories_id = " . $categories_id . " AND id <> " . $id . " AND status >= 1 LIMIT 0,3";
    $listproducts = pdo_query($sql); 
    return $listproducts;
}


function load_all_thongke()
{
    $sql = "SELECT categories.id AS madm, categories.name AS tendm, COUNT(products.id) AS countsp, MIN(products.price) AS minprice, MAX(products.price) AS maxprice, AVG(products.price) AS avgprice";
    $sql .= " FROM products LEFT JOIN categories ON categories.id=products.categories_id";
    $sql .= " WHERE categories.status >= 1"; // Thêm điều kiện cho status
    $sql .= " GROUP BY categories.id HAVING countsp >= 1 ORDER BY categories.id DESC";

    $listthongke = pdo_query($sql);
    return $listthongke;
}


function get_products_limit($start, $limit)
{
    $sql = "select * from products where status = 1 order by id desc limit $start, $limit";
    $dm = pdo_query($sql);
    return $dm;
}
