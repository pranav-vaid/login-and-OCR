<?php
session_start();
?>
<html>
<head><title>Log in Form</title>
<link href="loginform.css" type="text/css" rel="stylesheet">
</head>
<body style="background-color: rgb(220, 220, 220);">
<form action="cgi-bin\accounts.py" method="post">
<center>
<p style="padding-top:40px">
<table border="0" height="60%" width="25%" style="background-color: rgb(255, 255, 255);">
<tr>
<td class="textheading">LOGIN</td>
</tr>
<?php
if(isset($_GET["invalid"]))
{
?>
<tr>
<td>
<p align="center" style="color:red;">Invalid Username or Password</p>
</td>
</tr>
<?php
}
?>
<?php
if(isset($_GET["nologin"]))
{
?>
<tr>
<td>
<p style="color:red;" align="center">You've been logged out! Login Again.</p>
</td>
</tr>
<?php
}
if(isset($_REQUEST['locked']))
{
?>
<tr>
<td>
<p style="color:red;" align="center">Your account have been temporarily locked!!! Please try again later.</p>
</td>
</tr>
<?php
}
if(isset($_GET["invalidcaptcha"]))
{
?>
<tr>
<td>
<p style="color:red;" align="center">Invalid Captcha code!!</p>
</td>
</tr>
<?php
}
$_SESSION['login']='yes';
?>

<tr>
<td><center><input type="text" name="username" autocomplete="off" placeholder="Username" class="tbox" required></center></td>
</tr>

<tr>
<td><center><input type="password" name="password" placeholder="Password" class="tbox" required></center></td>
</tr>

<tr>
<td><center><img src="captcha.php" /><br><input type="text" name="captcha" placeholder="Enter captcha code" class="tbox" required /></center></td>
</tr>

<tr>
<td height="20%" style="padding-left:201px;">
<input type="submit" name="actionlogin" value="LOGIN" style="background-color:#69899f; border:0; height:30px; width:90px; color:white; font-size:18px;"></td>
</tr>

</table>
</p>
</center>

</body>
</html>