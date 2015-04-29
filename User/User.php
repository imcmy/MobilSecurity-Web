<html>
<head>
<meta https-equiv="content-type" content="text/html; charset=utf-8">
</head>
<?php
session_start();
$UserName=$_SESSION['USER_ACOT'];
echo "<h1>欢迎".$UserName."</h1>";
echo "<br/><a href='../login.php'>返回登陆界面</a><br/>";
?>
<br>
<h1>功能菜单</h1>
<a href='bondphone.php'>绑定手机</a><br/>
<a href='bondPC.php'>绑定本台PC</a><br/>
<a href='Update.php'>更改用户名、密码</a><br/>
<a href='#'>解绑手机</a><br/>
<a href='#'>解绑PC</a><br/>
</html>
