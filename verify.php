<?php
/**
* @author 紫旭网络
* @copyright 2017
*/
header("Content-type: text/html; charset=utf-8");

if (isset($_GET["name"]) || isset($_GET["xuehao"]) || isset($_GET["major"]) || isset($_GET["verifytime"])) {
    $name = $_GET["name"];
    $xuehao = $_GET["xuehao"];
    $major = $_GET["major"];
}

?>
<link href="css/verify.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/verify.js"></script>
<div id="main">
    <div id="verify"><img " /></div>
    <div class="avatar"><img src="img/avatar.png" /></div>
    <div class="content">
    <div class="info">姓名：<span id="name"><?php echo $name; ?></span></div>
    <div class="info">学号：<span id="xuehao"><?php echo $xuehao; ?></span></div>
    <div class="info">专业：<span id="major"><?php echo $major; ?></span></div>
    <div class="info">认证时间：<span id="verifytime"></span></div>
    </div>
</div>
<div id="information">
    <div class="content1">
        为什么要认证？
        <hr />
            <div class="info">由于选修课/体育课选课功能过于强大，导致一些图谋不轨的同学利用该功能进行盈利，严重违背了作者的初衷，因此需要认证后才可使用体育课和选修课选课辅助。</div>
        </div>
        <div class="content1">
        认证帮助
        <hr />
            <div class="info">确认铭牌上你的个人信息无误后，单击下面的“提交认证”按钮，我们会在24小时内审核。</div>
        </div>
        <div class="content1">
        提交认证
        <hr />
            <div class="info"><a class="btn" id="submitV" href="javascript:;">立即提交</a></div>
        </div>
</div>
