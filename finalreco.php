<?php
include_once("welcome.php");
echo("<br>");
?>
<html>
<?php
if(isset($_REQUEST['s']))
{
	$_SESSION['data']=$_REQUEST['s'];
	$_SESSION['alphabets']=$_REQUEST['a'];
	$_SESSION['digits']=$_REQUEST['d'];
?>
<head><meta http-equiv="refresh" content="0;url='finalreco.php'"/></head>
<?php
}
?>
<title>Result</title>
<body>
<?php
$data=$_SESSION['data'];
?>
<font face="ARIAL BLACK">
<center>
<table border="0" width=80%">
 <tr style="height:150px">
   
   <td width="50%"><font size="5.5">The characters in the image are:</td>
   <td width="50%"><font size="5.5"><?=$data?></td>
 </tr>
 <tr>
   <td>Number of alphabets in image are:</td>
   <td><?=$_SESSION['alphabets']?></td>
 </tr>
 <tr>
   <td>Number of digits in image are:</td>
   <td><?=$_SESSION['digits']?></td>
 </tr>
 </table>
 </center>
</body>
</html>