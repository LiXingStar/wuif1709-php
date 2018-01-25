<?php
 include '../libs/db.php';
 include '../libs/function.php';
 $obj = new unit();
 $table = $obj->articleTable($mysql,'article','category');
 include '../template/admin/articleshow.html';
