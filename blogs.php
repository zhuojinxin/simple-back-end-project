<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/5/13
 * Time: 12:14
 */
require_once('common/common.php');
if(!isset($_POST['id'])||empty($_POST['id']))
{
    $return=array();
    die(json_encode($return,JSON_UNESCAPED_UNICODE));
}
require_once ('common/conn.php');
$id=$_POST['id'];
$sql="select * from `blog_posts` where `id`=?";
$stmt=$pdo->prepare($sql);//sqlPDO预处理，防止SQL注入
$stmt->execute(array($id));
$result=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount()){
    $return=array("id"=>$result['id'],"title"=>$result['post_title'],"author"=>$result['post_author'],"date"=>$result['post_date'],"body"=>$result['post_content']);
    echo(json_encode($return,JSON_UNESCAPED_UNICODE));
}
?>