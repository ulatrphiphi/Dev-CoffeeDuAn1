<?php
function insert_categories($name)
{
    $sql = "insert into categories(name) values('$name ')";
    pdo_execute($sql);
}
function delete_categories($id,)
{
    $sql = "delete from categories where id =" . $id;
    pdo_execute($sql);
}
function load_all_categories()
{
    $sql = "select * from categories order by id desc";
    $list_categories = pdo_query($sql);
    return $list_categories;
}

function load_one_categories($id)
{
    $sql = "select * from categories where id = " . $id;
    $cate = pdo_query_one($sql);
    return $cate;
}
function update_categories($id,$name)
{
    $sql = "update categories set name = '" . $name . "' where id =" . $id;
    pdo_execute($sql);
}
