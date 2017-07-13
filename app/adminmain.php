<?php

/**
 * @author 紫旭网络
 * @copyright 2017
 */

header("Content-type: text/html; charset=utf-8");
session_start();
    if(checklogin()==true){
        echo "欢迎您，".$_SESSION["username"]."<hr />";
		echo '<div>
<label>查找方式：</label>
<select id="stype">
    <option value="0">全部</option>
    <option value="1">已通过</option>
    <option value="2" selected="selected">审核中</option>
    <option value="3">已驳回</option>
</select>
<input type="button" id="searchV" value="立即查询" />
</div>
<div id="result"></div>';
    }

    function checklogin(){
        if(empty($_SESSION["username"])){
            echo "你无权访问此页面";
            return false;
        }
        else{
            return true;
        }
    }
?>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/adminmain.js"></script>
<style type="text/css">
table,tr,td,th{
    border:1px solid black;
}
</style>
