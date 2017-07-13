<?php

/**
 * @author 紫旭网络
 * @copyright 2017
 * 连接数据库
*/
header("Content-type:text/html;charset=utf-8");

define("DB_HOST", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASSWORD", "Zjh19970223.");
define("DB_DBNAME", "zepc");


// 创建连接
// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DBNAME);
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DBNAME);


// 检测连接
if (mysqli_connect_errno($conn)) {
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
}

mysqli_set_charset($conn,"utf8");
