<html>
<head>
<meta https-equiv="content-type" content="text/html; charset=utf-8">
</head>
<?php
session_start();
$UserName=$_SESSION['USER_ACOT'];
echo "<h1>��ӭ".$UserName."</h1>";
echo "<br/><a href='../login.php'>���ص�½����</a><br/>";
?>
<br>
<h1>���ܲ˵�</h1>
<a href='bondphone.php'>���ֻ�</a><br/>
<a href='bondPC.php'>�󶨱�̨PC</a><br/>
<a href='Update.php'>�����û���������</a><br/>
<a href='#'>����ֻ�</a><br/>
<a href='#'>���PC</a><br/>
</html>
