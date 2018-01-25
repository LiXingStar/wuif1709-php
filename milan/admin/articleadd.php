<?php
  include '../libs/checkLogin.php';
  include '../libs/db.php';
  if($_SERVER['REQUEST_METHOD'] =='GET'){
      include '../libs/function.php';
      $obj = new unit();
      $str = $obj->cateTree($mysql,0,0,'category');

      $posarr = $mysql->query("select * from pos")->fetch_all(MYSQLI_ASSOC);

      include '../template/admin/articleadd.html';
  }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
//      var_dump();
      $_POST['posid'] = isset($_POST['posid'])?$_POST['posid']:0;
      $athumb = $_FILES['athumb'];
      $aimage = $_FILES['aimage'];
      include '../libs/upload.php';
      $upload = new upload($athumb);
      $thumburl = $upload->upfile();
      $upload1 = new upload($aimage);
      $imageurl = $upload1->upfile();
      $sql = "insert into article (cid,atitle,adesc,acontent,athumb,aimgs,posid) values ('{$_POST['cid']}','{$_POST['atitle']}','{$_POST['adesc']}','{$_POST['acontent']}','{$thumburl}','{$imageurl}','{$_POST['posid']}')";
      $mysql->query($sql);
     if($mysql->affected_rows == 1){
         $message = '文章插入成功';
         $url = 'articleshow.php';
     }else if($mysql->affected_rows < 0){
         $message = '文章插入成失败';
         $url = 'articleadd.php';
     }

     include 'message.html';

  }
