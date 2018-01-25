<?php

include 'header.php';
/*  about */
$sql = "select cname,engname,cdesc from category where cid=57";
$about = $mysql->query($sql)->fetch_assoc();

/* lists */

$sql = "select * from category where pid=17";
$data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
$article = [];
foreach ($data as $value) {
    $sql = "select * from article where cid={$value['cid']}";
    $news = $mysql->query($sql);
    while ($row = $news->fetch_assoc()){
        array_push($article,$row);
    }
}
$article = array_slice($article,0,9);

/* news */
$news = $mysql->query("select cname,engname from category where cid=55")->fetch_assoc();

$sql = "select nid,ntitle,ndesc from newsarticle order by nid desc limit 0,4";
$newslist = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
include '../template/index/index.html';
include 'footer.php';
// 栏目不需要全部显示到导航  isshow: ture false

// 模板  ctemp: category.html  list.html  show.html  show_news.html

// 数据  cmodel: category  list  show

