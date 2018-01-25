<?php


include 'header.php';

include '../libs/function.php';

$cid = $_GET['cid'];
$obj = new unit();
$breadnav = $obj->breadNav($cid,$mysql);
$data = $mysql->query("select * from category where cid=$cid")->fetch_assoc();

// cmodel
$cmodel = $data['cmodel'];

if ($cmodel == 'category') {
    $result = $mysql->query("select * from category where pid=$cid")->fetch_all(MYSQLI_ASSOC);
} else if($cmodel =='list'){
    /*
     * 总数total 个数 num
     * 页数 pages = ceil(total/num)
     * 0  0,3
     * 1  3,3
     * 2  6,3
     * */
   $page = isset($_GET['page'])?$_GET['page']:0;

   $result = $mysql->query("select * from newsarticle")->fetch_all(MYSQLI_ASSOC);
   $total = count($result);
   $num = 2;
   $pages = ceil( $total / $num );

   $offset = $page * $num;
    $datalist = $mysql->query("select * from newsarticle limit $offset,$num ")->fetch_all(MYSQLI_ASSOC);

}else if($cmodel == 'show'){
   "select * from ";
}


// 模板
$ctemp = $data['ctemp'];
include "../template/index/" . $ctemp;

include 'footer.php';