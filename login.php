<html>
<head>
<meta https-equiv="content-type" content="text/html;charset=utf-8">
</head>
<h1>��½ϵͳ</h1>
<form action="loginprocess.php" method="post" encType="multipart/form-data">
<table>
<tr><td>�û�id</td><td><input type="text" name="id"/></td></tr>
<tr><td>��&nbsp;��</td><td><input type="password" name="password"/></td></tr>
<tr>
<tr><td>�ϴ���½��ά���ļ���</td><td><input type="file" name="txt"><br>
</td></tr>
<tr>
<td><input type="submit" value="�û���¼"/></td>
<td><input type="reset" value="������д"/></td>
</tr>
</table>
</form>
<?php
if(!empty($_GET['errno'])){
$errno=$_GET['errno'];
if($errno=='1'){
echo "<br/><font color='red' size='3'>����û���������½��ά������";
}
}
?>
</html>