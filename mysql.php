<?php
// 连接mysql数据库
$link = mysqli_connect('localhost', 'root', '123456','hospital','3306');
if (!$link) {
    echo "connect mysql error!";
    exit();
}
// 设置mysql字符集 为 utf8
$link->query("set names utf8");
?>