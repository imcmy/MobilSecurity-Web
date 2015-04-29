<?php
session_start();
include "E:/www/QR/phpqrcode.php";//引入PHP QR库文件
	$temp_QR="xzhflying";
	$errorCorrectionLevel = "H";
	$matrixPointSize = "10";
	QRcode::png( $temp_QR, false,$errorCorrectionLevel, $matrixPointSize,1);
	$ID=$_SESSION['ID'];
	//链接数据库
	$conn=mysql_connect("localhost","root","123456");
	if(!$conn)
	{
	die("连接失败".mysql_errno());
	}
	mysql_query("set names utf8",$conn) or die(mysql_errno());
	mysql_select_db("tempqr",$conn) or die(mysql_errno());
	$sql="INSERT INTO tempqr VALUES('$ID','$temp_QR')";
	if(!$res=mysql_query($sql,$conn))
	{echo '出问题了！';}
	
	//关闭资源
	mysql_free_result($res);
	mysql_close($conn);

?>