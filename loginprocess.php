<?php
//�����û�������
session_start();
$id=$_POST['id'];
$password=$_POST['password'];

$_SESSION['USER_ACOT']=$id;
//������֤�ļ�
	$uploadRoot='tempfiles/';
	$files=$_FILES['txt'];
	$fileName=$files['name'];
	
	if(!is_writeable($uploadRoot)){exit();}
	
	$names=explode('.',$fileName);
	$newname=current($names).'_'.time().'.'.end($names);

	$fileSaved=$uploadRoot.$newname;
	if(!move_uploaded_file($files["tmp_name"],$fileSaved)){
		echo '�ƶ��ļ�ʧ��';
		exit();
	}
	if(!$handle=fopen("E:/www/tempfiles/$newname",'r')){echo'something wrong!';exit();}
	if(($contents=fread($handle,filesize("E:/www/tempfiles/$newname")))===false){echo'something wrong!';exit();}
	fclose($handle);

//2.�����ݿ������֤
$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
die("����ʧ��".mysql_errno());
}
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("userinfo",$conn) or die(mysql_errno());
$sql="select USER_PSWD,USER_LGQR,ID,USER_NAME from userinfo where USER_ACOT='$id'";
$res=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($res);

//��ѯ��id������Ҫ�ȶ�����
if($row['USER_PSWD']==$password && $contents==$row['USER_LGQR'])
{
$_SESSION['USER_NAME']=$row['USER_NAME'];
$_SESSION['ID']=$row['ID'];
header("Location: User/User.php");
exit();
}

header("Location: login.php?errno=1");
exit();
//�ر���Դ
mysql_free_result($res);
mysql_close($conn);