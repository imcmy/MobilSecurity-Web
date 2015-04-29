<html>
<head>
<meta https-equiv="content-type" content="text/html charset=utf-8">
</head>
<title>用户信息列表</title>
<?php
//显示所有用户的信息(表格)查询数据，在数据库
$conn=mysql_connect("localhost","root","123456");
if(!$conn)
{
die("连接失败".mysql_errno());
}
mysql_query("set names utf8",$conn) or die(mysql_errno());
mysql_select_db("usermanage",$conn) or die(mysql_errno());
$pageSize=5;
$rowCount=0;
$pageNow=1;//如果没有传送这个参数的话，默认值为1
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
echo "<tr><th>User_id</th><th>User_name</th><th>修改用户</th><th>删除用户</th></tr>";
//循环显示用户的信息
while($row=mysql_fetch_assoc($res))
{
echo"<tr><td>{$row['User_id']}</td><td>{$row['User_name']}</td>".
"<td><a href='#'>修改用户</td><td><a href='#'>删除用户</td></tr>";
}
echo "<h1>用户信息列表</h1>";
echo "</table>";
//打印出页面的超链接
for($i=1;$i<=$pageCount;$i++)
{echo "<a href='Userlist.php?pageNow=$i'>$i&nbsp ";
}
mysql_free_result($res);
mysql_close($conn);
?>
</html>