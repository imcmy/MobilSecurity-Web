<html>
<head>
<meta https-equiv="content-type" content="text/html charset=utf-8">
</head>
<title>�û���Ϣ�б�</title>
<?php
//��ʾ�����û�����Ϣ(���)��ѯ���ݣ������ݿ�
$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
die("����ʧ��".mysql_errno());
}
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("usermanage",$conn) or die(mysql_errno());
$pageSize=5;
$rowCount=0;
$pageNow=1;//���û�д�����������Ļ���Ĭ��ֵΪ1
if(!empty($_GET['pageNow']))
{ $pageNow=$_GET['pageNow'];}
$pageCount=0;
$sql="select count(User_id) from user";
$res1=mysql_query($sql);
if($row=mysql_fetch_row($res1))
{$rowCount=$row[0];
}
$pageCount=ceil($rowCount/$pageSize);
/*if($rowCount%$pagesize==0){
$pageCount=$rowCount/$pagesize;
}else{
$pageCount=ceil($rowCount/$pagesize);
}*/
$sql="select * from user limit ".($pageNow-1)*$pageSize.",$pageSize";
$res=mysql_query($sql,$conn);
echo "<table border='1px' bordercolor='green' cellspacing='0px' ;";
echo "<tr><th>User_id</th><th>User_name</th><th>�޸��û�</th><th>ɾ���û�</th></tr>";
//ѭ����ʾ�û�����Ϣ
while($row=mysql_fetch_assoc($res))
{
echo"<tr><td>{$row['User_id']}</td><td>{$row['User_name']}</td>".
"<td><a href='#'>�޸��û�</td><td><a href='#'>ɾ���û�</td></tr>";
}
echo "<h1>�û���Ϣ�б�</h1>";
echo "</table>";
//��ӡ��ҳ��ĳ�����
for($i=1;$i<=$pageCount;$i++)
{echo "<a href='Userlist.php?pageNow=$i'>$i&nbsp ";
}
mysql_free_result($res);
mysql_close($conn);
?>
</html>