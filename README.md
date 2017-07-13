# verifysystem
这是一个我自制的油猴插件认证系统，后台为了简洁没有CSS，前台是类似名片的界面，图自己做的；所有预期功能全部完成，完全开源；链接是我的博客，欢迎互换友链
博客地址：https://www.zixutech.cn

1、安装
测试/编写环境 PHP7 + Mysql5.5
导入 zepc.sql到数据库
前端首页：verify.php
注意 该页面需要传入GET参数才可以有功能，类似：http://yourdomain.com/verify.php?&name=[yourname]&xuehao=[yournumber]&major=[yourmajor]
参数名可在文件内修改

2、后台
没有写添加管理员功能，如果需要增加管理，请到mysql里手动操作

3、一些注意事项
认证Status 1-通过审核 2-待审核 3-驳回
后台available 1-可用 2-封禁
 
其他就没什么了，这是我边学边写PHP 3天的成果，嗷呜
