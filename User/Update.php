<html>
<head>
<meta https-equiv="content-type" content="text/html;charset=utf-8">
</head>
<h1>�޸�����</h1>
<form action="UpdatePS.php" method="post" encType="multipart/form-data">
<table>
<tr><td>�����������</td><td><input type="text" name="psw_old"/></td></tr>
<tr><td>������������</td><td><input type="text" name="psw_new"/></td></tr>
<tr><td>���ٴ�����������</td><td><input type="text" name="psw"/></td></tr>
<tr>
<tr><td>�ϴ���½��ά���ļ���</td><td><input type="file" name="txt"><br>
</td></tr>
<tr>
<td><input type="submit" value="�ύ����"/></td>
<td><input type="reset" value="������д"/></td>
</tr>
</table>
</form>
<?php
if(!empty($_GET['flag']))
{
	$flag=$_GET['flag'];
	if($flag=='1')
	{
	   echo '�޸ĳɹ���';
	}
}
?>
</html>