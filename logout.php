<?php
/**
 * Created by PhpStorm.
 * User: 卓卓
 * Date: 2018/4/22
 * Time: 22:04
 */
if(!empty($_COOKIE['XpzwoSUK'])){
    setcookie('XpzwoSUK',null,time()-1);
    echo "已退出登录";
}
else{
    echo "操作非法";
}

?>