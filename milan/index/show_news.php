<?php
include 'header.php';
$aid = $_GET['nid'];

$sql = "select * from newsarticle where nid=$nid";

$data = $mysql->query($sql)->fetch_assoc();
include '../template/index/show_news.html';

include "footer.php";