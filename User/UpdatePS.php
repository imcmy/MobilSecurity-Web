<?php
//接收用户的数据
session_start();
$psw_old=$_POST['psw_old'];
$psw_new=$_POST['psw_new'];
$psw=$_POST['psw'];
$id=$_SESSION['ID'];

//接收验证文件
$uploadRoot='../tempfiles/';
$files=$_FILES['txt'];
$fileName=$files['name'];

if(!is_writeable($uploadRoot)){exit();}

$names=explode('.',$fileName);
$newname=current($names).'_'.time().'.'.end($names);

$fileSaved=$uploadRoot.$newname;
if(!move_uploaded_file($files["tmp_name"],$fileSaved)){
	echo '移动文件失败';
	exit();
}
if(!$handle=fopen("E:/www/tempfiles/$newname",'r')){echo'something wrong!';exit();}
if(($contents=fread($handle,filesize("E:/www/tempfiles/$newname")))===false){echo'something wrong!';exit();}
fclose($handle);

//2.到数据库进行验证
$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
die("连接失败".mysql_errno());
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

if($psw_old!=$row['USER_PSWD']){echo '旧密码输入错误！';exit();}
if($psw!=$psw_new){echo '两次密码输入不一致！',exit();}
if($contents!=$row2['INFO']){echo '验证文件错误！';exit();}

mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("userinfo",$conn) or die(mysql_errno());
$sql3="UPDATE userinfo SET USER_PSWD='$psw_new' where ID='$id'";
$res3=mysql_query($sql3,$conn);

header("Location: Update.php?flag=1");
exit();


//关闭资源
mysql_free_result($res);
mysql_free_result($res2);
mysql_free_result($res3);
mysql_close($conn);