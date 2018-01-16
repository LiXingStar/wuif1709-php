<?php

 include '../libs/db.php';
 include "../libs/function.php";
 $obj = new unit();
 $table = $obj->cateTable($mysql,'category');
 include '../template/admin/cateshow.html';