<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/4/22
 * Time: 19:50
 */
require_once('common/common.php');
if(!isset($_POST['username'])||empty($_POST['username']))
{
    $return=array("code"=>201,"message"=>"登录失败");
    setcookie('XpzwoSUK',null);
    die(json_encode($return,JSON_UNESCAPED_UNICODE));
}
//简单校验：判断用户名是否被定义，是否为空
if(!isset($_POST['password'])||empty($_POST['password']))
{
    $return=array("code"=>201,"message"=>"登录失败");
    setcookie('XpzwoSUK',null);
    die(json_encode($return,JSON_UNESCAPED_UNICODE));}
//简单校验：判断密码是否被定义，是否为空
require_once('common/conn.php');
$user=$_POST['username'];
$pw=md5($_POST['password']);//MD5加密，与注册保持一致以进行校验
$sql="select * from `blog_users` where `username`=? and `password`=?";
$stmt=$pdo->prepare($sql);
$stmt->execute(array($user,$pw));
$rows=$stmt->rowCount();
if($rows){
    $return=array("code"=>200,"message"=>"登录成功");
    $userkey=md5(md5($user));
    setcookie('XpzwoSUK',$userkey,time()+3600*24);
    echo json_encode($return,JSON_UNESCAPED_UNICODE);
}
else
{
    $return=array("code"=>201,"message"=>"登录失败");
    setcookie('XpzwoSUK',null,time()-1);
    echo(json_encode($return,JSON_UNESCAPED_UNICODE));
}



?>