<?php
 /*
  * nid、标题、描述、缩略图、时间、内容、作者、发布者
  *
  * */

include "../libs/db.php";
if($_SERVER['REQUEST_METHOD'] =='GET'){
    include '../template/admin/newsadd.html';
}else if($_SERVER['REQUEST_METHOD'] =='POST'){
    include '../libs/upload.php';
    $file = $_FILES['nthumb'];
    $upload = new upload($file);
    $imgurl = $upload->upfile();
    $info = $_POST;
//    $info['nthumb'] = $imgurl;
    $keyarr = array_keys($info);
//    var_dump($_POST);
//    $sql = "insert into (ntitle,ndes) VALUES ('a',b,c) "

   /* $sql = "insert into newsarticle (";
    for($i=0;$i<count($keyarr);$i++){
        $sql .= $keyarr[$i] .",";
    }
    $sql = substr($sql,0,-1) . ") values (";

    foreach ($info as $v){
        $sql .= "'" .$v ."',";
    }
    $sql = substr($sql,0,-1) . ")";*/

     $sql = "insert into newsarticle (";
    for($i=0;$i<count($keyarr);$i++){
        $sql .= $keyarr[$i] .",";
    }
    $sql .= "nthumb) values (";

    foreach ($info as $v){
        $sql .= "'" .$v ."',";
    }
    $sql .= "'".$imgurl ."')";
}

