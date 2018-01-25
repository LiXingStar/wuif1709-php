<?php
include 'header.php';
$aid = $_GET['aid'];

$sql = "select * from article where aid=$aid";

$data = $mysql->query($sql)->fetch_assoc();
include '../template/index/show.html';

include "footer.php";