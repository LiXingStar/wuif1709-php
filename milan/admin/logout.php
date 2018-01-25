<?php
 session_start();
 $_SESSION = array();
 session_destroy();
 $message = '退出成功';
 $url = 'login.php';
 include 'message.html';
