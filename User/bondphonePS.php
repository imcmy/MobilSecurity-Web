<?php 
session_start();
$id=$_SESSION['ID'];

//������֤�ļ�
$uploadRoot='../tempfiles/';
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

$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
	die("����ʧ��".mysql_errno());
}
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("UK",$conn) or die(mysql_errno());
$sql="SELECT INFO FROM USER_UKEY where ID=$id";
$res=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($res);
if($row && $contents==$row['INFO'])
{
	header("Location: bondphone.php?flag=1");
	exit();
}else{
	echo '�����Ѱ󶨵�PC�����ֻ���!';	
}

mysql_free_result($res);
mysql_close($conn);
?>