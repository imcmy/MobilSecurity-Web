<html>
<body>
<form action="psdprosess.php" method="post" encType="multipart/form-data">
<table>
<tr><td>���ϴ���֤�ļ���</td><td><input type="file" name="txt"><br>
<tr><td> <input type="submit" value="�һ�"/> </td></tr>
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
	echo '��ɨ���Ϸ���ά��';
	}
}
?>
</body>

</html>