<?php
include_once("welcome.php");
echo("<br>");
?>
<html>
<?php
$req=isset($_REQUEST['r']);
if($req=="yes")
{
?>
<title>Successful Training</title>
<body>
<h1><p align="center">File Trained Successfully!!!</p></h1>
</body>
<?php
}
?>
</html>