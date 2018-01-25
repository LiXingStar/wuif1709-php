<?php
/*
 * 展示页面
 * 数据验证
 * */
header('Content-type:text/html;charset=utf8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../template/admin/login.html';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = md5($_POST['password']);

    include '../libs/db.php';
    $mysql->query('set names utf8');

    $sql = "select * from manager  where username='{$user}'";
    $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
    session_start();
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['username'] == $user) {
            if ($data[$i]['password'] == $password) {
                $message = '登陆成功';
                $url = 'main.php';
                $_SESSION['islogin'] = 'yes';
                $_SESSION['user'] =  $user;
                include 'message.html';
                exit();
            } else {
                $message = '密码错误';
                $url = 'login.php';
                include 'message.html';
                exit();
            }
        }
    }
    $message = '用户名不存在';
    $url = 'login.php';
    include 'message.html';
}
