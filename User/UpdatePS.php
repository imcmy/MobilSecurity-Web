<?php
//�����û�������
session_start();
$psw_old=$_POST['psw_old'];
$psw_new=$_POST['psw_new'];
$psw=$_POST['psw'];
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

//2.�����ݿ������֤
$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
die("����ʧ��".mysql_errno());
}
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("userinfo",$conn) or die(mysql_errno());
$sql="select USER_PSWD from userinfo where ID='$id'";
$res=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($res);

mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("UK",$conn) or die(mysql_errno());
$sql2="SELECT INFO FROM user_ukey where ID='$id'";
$res2=mysql_query($sql2,$conn);
$row2=mysql_fetch_assoc($res2);

if($psw_old!=$row['USER_PSWD']){echo '�������������';exit();}
if($psw!=$psw_new){echo '�����������벻һ�£�',exit();}
if($contents!=$row2['INFO']){echo '��֤�ļ�����';exit();}

mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("userinfo",$conn) or die(mysql_errno());
$sql3="UPDATE userinfo SET USER_PSWD='$psw_new' where ID='$id'";
$res3=mysql_query($sql3,$conn);

header("Location: Update.php?flag=1");
exit();


//�ر���Դ
mysql_free_result($res);
mysql_free_result($res2);
mysql_free_result($res3);
mysql_close($conn);