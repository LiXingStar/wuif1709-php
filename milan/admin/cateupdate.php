<?php

include '../libs/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../libs/function.php';
    $cid = $_GET['cid'];
    $obj = new unit();
    $str = $obj->cateTree($mysql, 0, 0, 'category', $cid);

    $data = $mysql->query("select * from category where cid=$cid")->fetch_assoc();

    include '../template/admin/cateupdate.html';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   /* 'pid' => string '0' (length=1)
  'cname' => string 'MiLan展' (length=8)
  'ename' => string 'MiLan show' (length=10)
  'cdesc' => string '这是MiLan展' (length=14)
  'cid' => string '1' (length=1)*/

//   $sql = "update category set pid='{$pid}', cname='xx',";
   $sql = "update category set ";
   foreach ($_POST as $k=>$v){
      if($k !='cid') {
          $sql .= $k . "='" . $v . "', ";
      }
   }
   $sql = substr($sql,0,-2);
   echo $sql;

}