<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/4/22
 * Time: 22:06
 */
function checkpassword($pw){
    
}

function checklogin(){
if($_COOKIE['XpzwoSUK']!=null)
{
    $sql="select * from `blog_users` where `username`='{$user}' and `password`='{$pw}'";
    $rows=0;
    foreach($pdo->query($sql) as $row){
        $rows++;
    }
    if($rows){
    return 1;
}
}
else
{

}
}