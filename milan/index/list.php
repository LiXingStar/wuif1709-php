<?php
 include 'header.php';
 include '../libs/function.php';
 $cid = $_GET['cid'];
 $obj = new unit();
 $breadnav = $obj->breadNav($cid,$mysql);
 $data = $mysql->query("select * from category where cid=$cid")->fetch_assoc();

 $result = $mysql->query("select * from article where cid=$cid")->fetch_all(MYSQLI_ASSOC);

 $ctemp = $data['ctemp'];

 include '../template/index/'.$ctemp;

include "footer.php";