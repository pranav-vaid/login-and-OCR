<?php
include_once("welcome.php");
echo("<br>");
?>
<html>
<link href="loginform.css" type="text/css" rel="stylesheet">
<?php
if(isset($_SESSION['success']))
{
?>
<head>
<title>Create Account</title>
</head>

<body>

<form action="cgi-bin\addaccount.py" method="post">

<center>
<table border="0" width="23%" style="background-color: rgb(255, 255, 255);">

<tr>
<td><center><h2>Create Account</h2></center></td>
</tr>

<tr>
<td><center><input type="text" name="username" autocomplete="off" placeholder="Username" class="tbox" required></center><br></td>
</tr>

<tr>
<td><center><input type="password" name="password" placeholder="Password" class="tbox" required></center><br></td>
</tr>
<tr>
<td height="20%" style="padding-left:192px; padding-bottom:30px">
<br>
<input type="submit" name="create" value="CREATE" style="background-color:#69899f; border:0; height:30px; width:90px; color:white; font-size:18px"></td>
</tr>

</table>
</center>

</body>
<?php
}
else
{
header("location:home.php");
}
?>
</html>