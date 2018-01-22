<?php
include '../libs/db.php';
$cid = $_GET['cid'];

// 判断存在子栏目
$sql = "select * from category where pid=$cid";
$data = $mysql->query($sql)->fetch_assoc();
if ($data) {
    $message = '存在子栏目,不允许删除';
    $url = 'cateshow.php';
    include 'message.html';
    exit();
}

$sql = "delete from category where cid=$cid";
$mysql->query($sql);
if($mysql->affected_rows){
    $message = '删除成功';
    $url = 'cateshow.php';
}else if($mysql->affected_rows < 0){
    $message = '删除失败';
    $url = 'cateshow.php';
}
include 'message.html';