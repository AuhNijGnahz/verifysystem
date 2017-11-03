<?php

/**
 * @author 紫旭网络
 * @copyright 2017
 */

header("Content-type: text/html; charset=utf-8");
session_start();
    if(checklogin()==true){
        echo "欢迎您，".$_SESSION["username"]."<hr />";
		echo '<fieldset>
		<legend id="first">审核开关(关闭后教务系统内将无法提交)</legend>
		<span>是否允许提交审核：</span>
		<input type="radio" name="tj" value="1" id="yx" /><label for="yx">允许</label>
		<input type="radio" name="tj" value="2" id="byx" /><label for="byx">不允许</label>
		<input type="button" id="changeV" value="确定" />
		</fieldset>
<div><fieldset id="second">
<legend>审核</legend>
<label>查找方式：</label>
<select id="stype">
    <option value="4">全部</option>
    <option value="1">已通过</option>
    <option value="2" selected="selected">审核中</option>
    <option value="3">已驳回</option>
</select>
<input type="button" id="searchV" value="立即查询" />
</div>
</fieldset>
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
