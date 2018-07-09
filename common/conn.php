<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/4/21
 * Time: 0:14
 */
//以下数据库已搭建好相关数据库结构，方便测试，另项目文件夹中里有数据库导出文件data.sql
$MYSQL_HOST_DBNAME = "mysql:host=localhost;dbname=hmt_test;";  //数据库主机和数据库名，格式如左
$MYSQL_USERNAME= "hmt";  //数据库用户名
$MYSQL_PASSWORD = "ASDFfdsa,123";  //数据库密码

try{
    $pdo = new PDO($MYSQL_HOST_DBNAME,$MYSQL_USERNAME,$MYSQL_PASSWORD);
}catch(PDOException $e){
    die("数据库连接失败".$e->POSTMessage());  //连接失败的话显示错误信息
}

?>