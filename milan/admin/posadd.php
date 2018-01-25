<?php

 include '../libs/db.php';
 if($_SERVER['REQUEST_METHOD'] =='GET'){
    include '../template/admin/posadd.html';
 }else if($_SERVER['REQUEST_METHOD'] =='POST'){
   $pname = $_POST['pname'];
   $sql = "insert into pos (pname) values ('{$pname}')";
   $mysql->query($sql);
   if($mysql->affected_rows == 1){
       $message = '推荐位插入成功';
       $url = 'posshow.php';
   }else if($mysql->affected_rows < 0){
       $message = '推荐位插入失败';
       $url = 'posadd.php';
   }

     include "message.html";
 }

