<html>
<head>
<meta https-equiv="content-type" content="text/html;charset=utf-8">
</head>
<h1>登陆系统</h1>
<form action="loginprocess.php" method="post" encType="multipart/form-data">
<table>
<tr><td>用户id</td><td><input type="text" name="id"/></td></tr>
<tr><td>密&nbsp;码</td><td><input type="password" name="password"/></td></tr>
<tr>
<tr><td>上传登陆二维码文件：</td><td><input type="file" name="txt"><br>
</td></tr>
<tr>
<td><input type="submit" value="用户登录"/></td>
<td><input type="reset" value="重新填写"/></td>
</tr>
</table>
</form>
<?php
if(!empty($_GET['errno'])){
$errno=$_GET['errno'];
if($errno=='1'){
echo "<br/><font color='red' size='3'>你的用户名密码或登陆二维码有误";
}
}
?>
</html>