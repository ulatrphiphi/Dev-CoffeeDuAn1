<?php
function insert_categories($name)
{
    $sql = "insert into categories(name) values('$name')";
    pdo_execute($sql);
}
function delete_categories($id)
{
    $sql = "update categories set status = 0 where id =" . $id;
    pdo_execute($sql);
}
function restore_categories($id)
{
    $sql = "update categories set status = 1 where id =" . $id;
    pdo_execute($sql);
}
function load_all_categories()
{
    $sql = "select * from categories where status = 1 order by id desc";
    $list_categories = pdo_query($sql);
    return $list_categories;
}
function load_deleted_categories()
{
    $sql = "select * from categories where status = 0 order by id desc";
    $list_categories = pdo_query($sql);
    return $list_categories;
}

function load_one_categories($id)
{
    $sql = "select * from categories where id = " . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_categories($id,$name)
{
    $sql = "update categories set name = '" . $name . "' where id =" . $id;
    pdo_execute($sql);
}


function get_categories_limit($start, $limit)
{
    $sql = "select * from categories where status = 1 order by id desc limit $start, $limit";
    $dm = pdo_query($sql);
    return $dm;
}