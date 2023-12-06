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

?>