<?php 
$file_name = "������֤�ļ�.txt";
$file_dir = "E:/www/tempQR/"; 
if (!file_exists($file_dir . $file_name)) {
 //����ļ��Ƿ���� 
echo "�ļ��Ҳ���"; 
exit; } 
else { $file = fopen($file_dir . $file_name,"r"); // ���ļ� // �����ļ���ǩ 
Header("Content-type: application/octet-stream"); 
Header("Accept-Ranges: bytes"); 
Header("Accept-Length: ".filesize($file_dir . $file_name)); 
Header("Content-Disposition: attachment; filename=" . $file_name); // ����ļ����� 
echo fread($file,filesize($file_dir . $file_name)); 
fclose($file); exit;}
?>