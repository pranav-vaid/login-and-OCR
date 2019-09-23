<?php
include_once("welcome.php");
echo("<br>");
?>
<html>
<?php
if(isset($_SESSION['user']))
{
?>
<head>
<title>Upload Font</title>
</head>
<center>
<table border="0" bordercolor="#111111" width="28%">
  <tr>
    <td bgcolor="#3B3B3B" style="padding-top:8px">
    <p align="center">
    <span style="background-color: #3B3B3B">
    <font face="Arial Rounded MT Bold" size="5" color="#FFFFFF">Upload File for Adding More 
    Fonts</font></span></td>
  </tr>
</table>

<p>&nbsp;</p>

<form action="cgi-bin\GenData.py" method="post" name="add">
<p>Upload file<input type="file" name="inputfileadd" size="20"></p>
<br>
<input type='submit' name='actionadd' value='Add File' style="background-color:#69899f; border:0; height:30px; width:100px; color:white; font-size:16px;">

</center>
<?php
}
else
	header("location:home.php");
?>
</html>