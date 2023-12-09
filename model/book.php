<?php

    function booking( $name, $tel,$email, $date, $customers, $note){
    $sql = "insert into orders(name,tel,email,date,customers,note) values( '$name', '$tel','$email', '$date', '$customers', '$note')";
    pdo_execute($sql);
    }

    function load_all_order()
{
    $sql = "select * from orders where status = 1 order by id desc";
    $order = pdo_query($sql);
    return $order;
}
    function load_one_order()
{
    $order_id = $_SESSION['id'];
    $sql = "select * from orders where id=" .$order_id;
    $order = pdo_query($sql);
    return $order;
}

function getOrder()
{
    $order = $_SESSION['id'];
    $sql = "select * from orders WHERE id = $order";
    $selectUser = pdo_query_one($sql);
    return $selectUser;
}