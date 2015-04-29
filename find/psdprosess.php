<?php 
session_start();

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

$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
	die("连接失败".mysql_errno());
}
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("UK",$conn) or die(mysql_errno());
$sql1="SELECT ID FROM user_ukey where INFO='$contents'";
$res1=mysql_query($sql1,$conn);
$row1=mysql_fetch_assoc($res1);
if(!$row1){echo '不存在的验证文件！';exit();}
$id=$row1['ID'];

if($id != NULL)
{
	$_SESSION['ID']=$row1['ID'];
	header("Location: findpsd.php?flag=1");
	exit();
}else{
	echo '验证文件错误！';	
}

mysql_free_result($res);
mysql_free_result($res1);
mysql_close($conn);
?>