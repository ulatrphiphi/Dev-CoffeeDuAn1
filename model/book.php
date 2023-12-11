<?php

    function booking( $name, $tel,$email, $date, $customers, $note){
    $sql = "insert into orders(name,tel,email,date,customers,note) values( '$name', '$tel','$email', '$date', '$customers', '$note')";
    pdo_execute($sql);
    }

    function load_all_order()
{
    $sql = "select * from orders order by id desc";
    $order = pdo_query($sql);
    return $order;
}
    function load_one_order($id)
{
    $sql = "select id,name,payment from orders where id= $id";
    $order = pdo_query_one($sql);
    return $order;
}
function update_status($id,$status)
{
    $sql = "update orders set status = '" . $status . "' where id =" . $id;
    pdo_execute($sql);
}

function getOrder()
{
    $order = $_SESSION['id'];
    $sql = "select * from orders WHERE id = $order";
    $selectUser = pdo_query_one($sql);
    return $selectUser;
}