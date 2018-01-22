<?php
/*
 *  数据模型  model
 *  控制器    controller
 *  视图      view
 *
 * */
include '../libs/db.php';
$sql = "select cname,cid from category where pid=0 and isshow='true'";
$data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

include '../template/index/header.html';