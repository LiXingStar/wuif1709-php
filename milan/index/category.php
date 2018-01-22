<?php


include 'header.php';


$cid = $_GET['cid'];
$data = $mysql->query("select * from category where cid=$cid")->fetch_assoc();

// cmodel
$cmodel = $data['cmodel'];

if ($cmodel == 'category') {
    $result = $mysql->query("select * from category where pid=$cid")->fetch_all(MYSQLI_ASSOC);
}


// 模板
$ctemp = $data['ctemp'];
include "../template/index/" . $ctemp;

include 'footer.php';