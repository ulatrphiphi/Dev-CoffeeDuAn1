<?php

function insert_products($iddm, $tensp, $giasp, $hinh, $mota ){
    $sql="insert into products(categories_id,name,price,img,detail) values('$iddm', '$tensp', '$giasp', '$hinh', '$mota' )";
    pdo_execute($sql);
}
function delete_products($id){
    $sql="delete from products where id=".$id;
    pdo_execute($sql);
}


function loadall_products_home(){
    $sql="select * from products where 1 order by id desc limit 0,6"; 
    $listproducts=pdo_query($sql); 
    return $listproducts;
}
function loadall_products_top10(){
    $sql="select * from products where 1 order by luotxem desc limit 0,10"; 
    $listproducts=pdo_query($sql); 
    return $listproducts;
}

function load_all_products($kyw="", $iddm=0){
    $sql="select * from products where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and categories_id = '".$iddm."'";
    }
    $sql.=" order by id desc";
    $sql = "select * from products order by id desc";
    $listproducts=pdo_query($sql); 
    return $listproducts;
}

function load_one_products($id){
    $sql="select * from products where id=".$id;
    $products=pdo_query_one($sql);
    return $products;
}
function load_ten_dm($iddm){
    if($iddm>0){
    $sql="select * from danhmuc where id=".$iddm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
}else{
    return "";
}
}
function load_products_cungloai($id,$iddm){
    $sql="select * from products where categories_id=".$iddm." AND id <> ".$id;
    $listproducts=pdo_query($sql); 
    return $listproducts;
}

function update_products($id, $iddm, $tensp, $giasp, $mota, $hinh){
    if($hinh!=""){
        $sql="update products set categories_id='".$iddm."', name='".$tensp."', price='".$giasp."', detail='".$mota."', img='".$hinh."'   where id=".$id;
    }else{
        $sql="update products set categories_id='".$iddm."', name='".$tensp."', price='".$giasp."', detail='".$mota."'   where id=".$id;
    }
    
    pdo_execute($sql);
}

?>