<?php
$mysql = new mysqli('localhost','root','','milan',3306);
if($mysql->connect_errno){
    echo '数据库连接失败,失败的信息' . $mysql->connect_errno;
    exit();
}
$mysql->query('set names utf8');