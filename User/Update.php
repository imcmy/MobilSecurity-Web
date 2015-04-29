<html>
<head>
<meta https-equiv="content-type" content="text/html;charset=utf-8">
</head>
<h1>修改密码</h1>
<form action="UpdatePS.php" method="post" encType="multipart/form-data">
<table>
<tr><td>请输入旧密码</td><td><input type="text" name="psw_old"/></td></tr>
<tr><td>请输入新密码</td><td><input type="text" name="psw_new"/></td></tr>
<tr><td>请再次输入新密码</td><td><input type="text" name="psw"/></td></tr>
<tr>
<tr><td>上传登陆二维码文件：</td><td><input type="file" name="txt"><br>
</td></tr>
<tr>
<td><input type="submit" value="提交更改"/></td>
<td><input type="reset" value="重新填写"/></td>
</tr>
</table>
</form>
<?php
if(!empty($_GET['flag']))
{
	$flag=$_GET['flag'];
	if($flag=='1')
	{
	   echo '修改成功！';
	}
}
?>
</html>