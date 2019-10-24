<?php
include_once("welcome.php");
echo("<br>");
?>
<html>
<link href="loginform.css" type="text/css" rel="stylesheet">
<?php
if(isset($_SESSION['success']))
{
$sno=$_REQUEST['sno'];
?>
<head>
<title>Edit Account</title>
</head>

<body>
<h1 align="center">Edit Account</h1>
<br>
<p align="center">To edit username, click <a href="edit.php?sno=<?=$sno?>&uname">here</a>, and to edit password click <a href="edit.php?sno=<?=$sno?>&pwd">here</a>.</p>

<?php
if(isset($_REQUEST['uname']))
{
?>
<center>
<form action="\cgi-bin\edituname.py" method="post" name="uname">
<input type="hidden" name="sno" value="<?=$sno?>">
<br>
<table border="0">

<tr>
  <td><font size="5" face="Arial">Username </font><br></td>
  <td><input type="text" name="username" autocomplete="off" size="20" class="tbox" style="background-color: rgb(220, 220, 220);" required ></td>
</tr>

<tr>
  <td colspan="2" style="padding-top:20px"><center><input type="submit" name="uname" value="Update" style="background-color:#69899f; border:0; height:30px; width:90px; color:white; font-size:18px;"></center></td>
</tr>
</table>
</center>
<?php
}
if(isset($_REQUEST['pwd']))
{
?>
<center>
<form action="\cgi-bin\editpwd.py" method="post" name="pwd">
<input type="hidden" name="sno" value="<?=$sno?>">
<br>
<table border="0">
<tr>
  <td><font size="5" face="Arial">Password </font><br></td>
  <td><input type="password" name="password" size="20" class="tbox" style="background-color: rgb(220, 220, 220);" required></td>
</tr>

<tr>
  <td colspan="2" style="padding-top:20px"><center><input type="submit" name="pwd" value="Update" style="background-color:#69899f; border:0; height:30px; width:90px; color:white; font-size:18px;"></center></td>
</tr>
</table>
</center>>
<?php
}
?>

</body>
<?php
}
else
{
?>
<h1>Session Expired</h1>
<p>Try logging in again.</p>
<p>&nbsp;
Go to <a href="loginform.php">login</a> page.
</p>
<?php
}
?>
</html>