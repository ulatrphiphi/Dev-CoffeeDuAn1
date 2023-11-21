<?php

function loadall_user(){
    $sql="select * from users order by id desc";
    $listuser=pdo_query($sql);
    return $listuser;
}

function insert_user($email, $user, $pass ){
    $sql="insert into users(email,user,pass) values('$email', '$user', '$pass')";
    pdo_execute($sql);
}

function checkuser($user, $pass){
    $sql="select * from users where user='".$user."' AND pass='".$pass."'";
    $user=pdo_query_one($sql);
    return $user;
}
function checkemail($email){
    $sql="select * from taikhoan where email='".$email."'";
    $sanpham=pdo_query_one($sql);
    return $sanpham;
}

function update_user($id, $user, $pass, $email, $address, $tel){
    
    $sql="update users set user='".$user."', pass='".$pass."', email='".$email."', address='".$address."', tel='".$tel."'   where id=".$id;
    pdo_execute($sql);
}

function delete_user($id)
{
    $sql = "delete from users where id=" . $id;
    pdo_execute($sql);
}



?>