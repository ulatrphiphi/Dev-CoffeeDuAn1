<?php

    function booking( $name, $tel, $date, $customers, $note){
    $sql = "insert into orders(name,tel,date,customers,note) values( '$name', '$tel', '$date', '$customers', '$note')";
    pdo_execute($sql);
    }

?>