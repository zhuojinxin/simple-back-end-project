<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/4/27
 * Time: 14:49
 */
require_once('common/common.php');
if(!empty($_COOKIE['XpzwoSUK']))
{
    $userkey=$_COOKIE['XpzwoSUK'];
    require_once ('common/conn.php');
   $sql="select * from `blog_users` where `username_key`=?";
   $stmt=$pdo->prepare($sql);//sqlPDO预处理，防止SQL注入
   $stmt->execute(array($userkey));
   $rows=$stmt->rowCount();
   if($rows){
$username=$stmt->fetch(PDO::FETCH_ASSOC);
$user=$username['username'];
       if(!isset($_POST['title'])||empty($_POST['title']))
       {
           $return=array("code"=>201,"message"=>"发布失败");
           die(json_encode($return,JSON_UNESCAPED_UNICODE));
       }
       if(!isset($_POST['body'])||empty($_POST['body']))
       {
           $return=array("code"=>201,"message"=>"发布失败");
           die(json_encode($return,JSON_UNESCAPED_UNICODE));
       }
$title=$_POST['title'];
$body=$_POST['body'];
$title_text=htmlspecialchars($title);
$body_text=htmlspecialchars($body);//转义函数，防止XSS注入
$sql="INSERT INTO `blog_posts` (`id`, `post_title`, `post_content`, `post_author`, `post_date`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP);";
$stmt2=$pdo->prepare($sql);//sqlPDO预处理，防止SQL注入
$stmt2->execute(array($title_text,$body_text,$user));
$row2=$stmt2->rowCount();
if($row2){
    $return=array("code"=>200,"message"=>"发布成功");
    echo json_encode($return,JSON_UNESCAPED_UNICODE);
}
else{
    $return=array("code"=>201,"message"=>"发布失败");
    echo json_encode($return,JSON_UNESCAPED_UNICODE);
}

    }
    else{
        $return=array("code"=>201,"message"=>"发布失败");
        echo json_encode($return,JSON_UNESCAPED_UNICODE);
        //这个判断主要实现后端校验，前端，本地的数据都是存在不安全性的，要避免水平权限绕过，如果201，说明登录信息是虚假的
    }
}
else
{
    $return=array("code"=>201,"message"=>"发布失败");
    echo json_encode($return,JSON_UNESCAPED_UNICODE);
}
?>