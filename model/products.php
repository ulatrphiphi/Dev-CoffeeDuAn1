<?php

function insert_products($categories_id, $name, $price, $img, $detail ){
    $sql="insert into products(categories_id,name,price,img,detail) values('$categories_id', '$name', '$price', '$img', '$detail' )";
    pdo_execute($sql);
}
function delete_products($id){
    $sql = "update products set status = 0 where id =" . $id;
    pdo_execute($sql);
}
function restore_products($id){
    $sql = "update products set status = 1 where id =" . $id;
    pdo_execute($sql);
}
function load_all_products($kyw="", $categories_id=0){
    $sql="select * from products where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($categories_id>0){
        $sql.=" and categories_id = '".$categories_id."'";
    }
    $sql.=" order by id desc";
    $sql = "select * from products where status = 1 order by id desc";
    $listproducts=pdo_query($sql); 
    return $listproducts;
}
function load_deleted_products($kyw="", $categories_id=0){
    $sql="select * from products where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($categories_id>0){
        $sql.=" and categories_id = '".$categories_id."'";
    }
    $sql.=" order by id desc";
    $sql = "select * from products where status = 0 order by id desc";
    $listproducts=pdo_query($sql); 
    return $listproducts;
}

function load_one_products($id){
    $sql="select * from products where id=".$id;
    $products=pdo_query_one($sql);
    return $products;
}
function load_ten_dm($categories_id){
    if($categories_id>0){
    $sql="select * from categories where id=".$categories_id;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
}else{
    return "";
}
}
function load_products_cungloai($id,$categories_id){
    $sql="select * from products where categories_id=".$categories_id." AND id <> ".$id;
    $listproducts=pdo_query($sql); 
    return $listproducts;
}

function update_products($id, $categories_id, $name, $price, $detail, $img){
    if($img!=""){
        $sql="update products set categories_id='".$categories_id."', name='".$name."', price='".$price."', detail='".$detail."', img='".$img."'   where id=".$id;
    }else{
        $sql="update products set categories_id='".$categories_id."', name='".$name."', price='".$price."', detail='".$detail."'   where id=".$id;
    }
    pdo_execute($sql);
}

function load_all_thongke()
{
    $sql = "select categories.id as madm, categories.name as tendm, count(products.id) as countsp, min(products.price) as minprice, max(products.price) as maxprice, avg(products.price) as avgprice";
    $sql .= " from products left join categories on categories.id=products.categories_id";
    $sql .= " group by categories.id order by categories.id desc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}
?>