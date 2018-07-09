<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/4/21
 * Time: 0:49
 */
require_once('common/common.php');
if(!isset($_POST['username'])||empty($_POST['username']))
{
    $return=array("code"=>201,"message"=>"注册失败");
    die(json_encode($return,JSON_UNESCAPED_UNICODE));
}
//简单校验：判断用户名是否被定义，是否为空
if(!isset($_POST['password'])||empty($_POST['password']))
{
    $return=array("code"=>201,"message"=>"注册失败");
    die(json_encode($return,JSON_UNESCAPED_UNICODE));
}
//简单校验：判断密码是否被定义，是否为空
require_once('common/conn.php');
$user=$_POST['username'];
$pw=md5($_POST['password']);//密码加密，一般的网站md5加密就行了
$user_key=md5(md5($user));//两次md5加密，避免暴力破解成功，usernamekey将用于登录的cookie值。
$sql="select * from `blog_users` where `username`=?";
$stmt=$pdo->prepare($sql);
$stmt->execute(array($user));
$rows=$stmt->rowCount();
if($rows){ 
      
        $return=array("code"=>201,"message"=>"注册失败");
        echo json_encode($return,JSON_UNESCAPED_UNICODE);

}
else{
    $sql = "INSERT INTO `blog_users` VALUES (NULL, ?,?, CURRENT_TIMESTAMP,?);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array($user,$pw,$user_key));
    $rows=$stmt->rowCount();
    if($rows>0){
        $return=array("code"=>200,"message"=>"注册成功");
        echo json_encode($return,JSON_UNESCAPED_UNICODE);
    }
    else{
        $return=array("code"=>201,"message"=>"注册失败");
        echo json_encode($return,JSON_UNESCAPED_UNICODE);
    }

}

//判断用户是否存在，存在注册失败，不存在即可进行注册
?>

