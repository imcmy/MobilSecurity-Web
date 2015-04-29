<?php 
session_start();
$user_name=$_POST['user_name'];

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
mysql_select_db("userinfo",$conn) or die(mysql_errno());
$sql1="SELECT ID FROM userinfo where USER_ACOT='$user_name'";
$res1=mysql_query($sql1,$conn);
$row1=mysql_fetch_assoc($res1);
if(!$row1){echo '不存在的用户名！';exit();}
$id=$row1['ID'];
echo $id;
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("UK",$conn) or die(mysql_errno());
$sql="SELECT INFO FROM user_ukey where ID='$id'";
$res=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($res);

if($row && $contents==$row['INFO'])
{
	$_SESSION['ID']=$row['ID'];
	header("Location: findQR.php?flag=1");
	exit();
}else{
	echo '验证文件错误！';	
}

mysql_free_result($res);
mysql_free_result($res1);
mysql_close($conn);
?>