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
<title>Recognize</title>
</head>
<body>
<center>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="25%">
  <tr>
    <td bgcolor="#3B3B3B" style="padding-top:8px">
    <p align="center">
    <span style="background-color: #3B3B3B">
    <font face="Arial Rounded MT Bold" size="5" color="#FFFFFF">Upload File for Recognition</font></span></td>
  </tr>
</table>


<p>&nbsp;</p>

<form action="cgi-bin\TrainAndTest.py" method="post" name="recognize">
<p>Upload file <input type="file" name="inputfile" size="20"></p><br>
<input type='submit' name='action' value='Upload File' style="background-color:#69899f; border:0; height:30px; width:100px; color:white; font-size:16px">
</center>
</body>
<?php
}
else
	header("location:home.php");
?>
</html>