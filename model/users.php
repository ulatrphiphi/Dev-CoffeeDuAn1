<?php

function loadall_user()
{
    $sql = "select * from users where status = 1  order by id desc";
    $listuser = pdo_query($sql);
    return $listuser;
}

function load_deleted_user()
{
    $sql = "select * from users where status = 0 order by id desc";
    $list_user = pdo_query($sql);
    return $list_user;
}

function insert_user($email, $user, $pass, $cpass)
{
    if ($pass === $cpass) {
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "insert into users(email,user,pass) values(? , ?,  ?)";
        pdo_execute($sql, $email, $user, $pass_hash);
        header('LOCATION: index.php?act=login');
    } else {
        echo '<script>alert("Mật khẩu nhập lại không đúng")</script>';
    }
}

function checkuser($user)
{
    $sql = "select * from users where user = '" . $user . "'";
    $selectUser = pdo_query_one($sql);
    return $selectUser;
}
function getUser()
{
    $user = $_SESSION['user_id'];
    $sql = "select user from users WHERE id = $user";
    $selectUser = pdo_query_one($sql);
    return $selectUser;
}
function getRole()
{
    $user = $_SESSION['user_id'];
    $sql = "select role from users WHERE id = $user";
    $selectUser = pdo_query_one($sql);
    return $selectUser;
}
function checkemail($email)
{
    $sql = "select * from users where email='" . $email . "'";
    $user = pdo_query_one($sql);
    if ($sql) {
        return $user;
    } else {
        echo '<h4>Email không tồn tại</h4>';
    }
}



function update_user($id, $user, $pass, $email, $address, $tel)
{

    $sql = "update users set user='" . $user . "', pass='" . $pass . "', email='" . $email . "', address='" . $address . "', tel='" . $tel . "'   where id=" . $id;
    pdo_execute($sql);
}

function delete_user($id)
{
    $sql = "update users set status = 0 where id=" . $id;
    pdo_execute($sql);
}
