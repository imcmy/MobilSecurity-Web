<?php
session_start();
include "E:/www/QR/phpqrcode.php";//����PHP QR���ļ�
	$temp_QR="xzhflying";
	$errorCorrectionLevel = "H";
	$matrixPointSize = "10";
	QRcode::png( $temp_QR, false,$errorCorrectionLevel, $matrixPointSize,1);
	$ID=$_SESSION['ID'];
	//�������ݿ�
	$conn=mysql_connect("localhost","root","123456");
	if(!$conn)
	{
	die("����ʧ��".mysql_errno());
	}
	mysql_query("set names utf8",$conn) or die(mysql_errno());
	mysql_select_db("tempqr",$conn) or die(mysql_errno());
	$sql="INSERT INTO tempqr VALUES('$ID','$temp_QR')";
	if(!$res=mysql_query($sql,$conn))
	{echo '�������ˣ�';}
	
	//�ر���Դ
	mysql_free_result($res);
	mysql_close($conn);

?>