<html>
<body>
<form action="bondphonePS.php" method="post" encType="multipart/form-data">
<table>
<tr><td>请上传验证文件：</td><td><input type="file" name="txt"><br>
<tr><td> <input type="submit" value="绑定"/> </td></tr>
</table>
</form>
<?php
session_start();
if(!empty($_GET['flag']))
{
	$flag=$_GET['flag'];
	if($flag=='1')
	{
	echo "<img src='../createQR.php'>";
	echo '<br>';
	echo '请扫描上方二维码';
	}
}
?>
</body>

</html>