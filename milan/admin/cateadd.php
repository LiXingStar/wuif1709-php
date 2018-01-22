<?php
// 展示添加页面
// 提交数据
include '../libs/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../libs/function.php';
    $obj = new unit();
    $str = $obj->cateTree($mysql,0,0,'category');
    include '../template/admin/cateadd.html';
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pid = $_POST['pid'];
    $cname = $_POST['cname'];
    $engname = $_POST['ename'];
    $cdesc = $_POST['cdesc'];
    $isshow = $_POST['isshow'];
    $ctemp = $_POST['ctemp'];
    $cmodel = $_POST['cmodel'];
    $info = $_FILES['cimage'];

    if (is_uploaded_file($info['tmp_name'])) {
        if (!file_exists('../static/upload')) {
            mkdir('../static/upload');
        }
        $date = date('y-m-d');
        $path = '../static/upload/' . $date;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $type = explode('.', $info['name'])[1];

        $path = $path . '/' . time() . '.' . $type;
        move_uploaded_file($info['tmp_name'], $path);
        $imgurl = '/milan/' . substr($path, 3);
    }

    $sql = "insert into category (pid,cname,engname,cdesc,cimage,isshow,ctemp,cmodel) values ($pid,'{$cname}','{$engname}','{$cdesc}','{$imgurl}','{$isshow}','{$ctemp}','{$cmodel}')";
    $mysql->query($sql);

    if ($mysql->affected_rows) {
        $message = "栏目插入成功";
        $url = 'cateshow.php';
    } else if ($mysql->affected_rows < 0) {
        $message = "栏目插入失败";
        $url = 'cateadd.php';
    }
    include 'message.html';
}