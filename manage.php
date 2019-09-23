<?php
include_once("welcome.php");
echo("<br>");
?>

<html>
<?php
if(isset($_SESSION['success']))
{




   class MyDB extends SQLite3 
   {
      function __construct() 
      {
         $this->open('C:\xampp\cgi-bin\useraccounts.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) 
   {
      echo $db->lastErrorMsg();
   }

   $sql =<<<EOF
      SELECT * from accounts;
EOF;

   $ret = $db->query($sql);
?>

<title>Manage Accounts</title>
<body>

<p align="center"><font face="Arial Black" size="5">Accounts</font></p>
<center>
<?php
if(isset($_REQUEST['added']))
{
?>
<p align="center" style="color:blue">Account added successfully!!!</p>
<?php
}

if(isset($_REQUEST['deleted']))
{
?>
<p align="center" style="color:red">Account deleted successfully!!!</p>
<?php
}

if(isset($_REQUEST['statuschanged']))
{
?>
<p align="center" style="color:green">Status changed successfully!!!</p>
<?php
}
if(isset($_REQUEST['usernamechanged']))
{
?>
<p align="center" style="color:green">Username changed successfully!!!</p>
<?php
}
if(isset($_REQUEST['passwordchanged']))
{
?>
<p align="center" style="color:green">Password changed successfully!!!</p>
<?php
}
?>

<table border="0" cellpadding="0" cellspacing="0" bordercolor="#111111" width="50%" style="background-color: rgb(255, 255, 255);">

  <tr style="height:35px;">
    <td width="20%" bgcolor="#000000" style="padding-left:5px;">
      <font size="4" color="#FFFFFF"><b>S. No.</b></font></td>
    <td width="20%" bgcolor="#000000">
      <font size="4" color="#FFFFFF"><b>Username</b></font></td>
    <td width="2%" bgcolor="#000000">
      <font size="4" color="#FFFFFF"></font></td>
    <td width="2%" bgcolor="#000000">
      <font size="4" color="#FFFFFF"></font></td>
    <td width="2%" bgcolor="#000000">
      <font size="4" color="#FFFFFF"></font></td>
  </tr>

  <?php
  $a=1;
  while($row = $ret->fetchArray(SQLITE3_ASSOC) )
  {
  ?>
  <tr style="height:32px;">
    <td width="20%" style="padding-left:18px;"><?=$a?></td>
    <td width="20%"><?=$row['username']?></td>
	<td width="5%">
      <?php
	  if($row['username']!='admin')
        if($row['status']=="T")
        {
        ?>
          <a href="\cgi-bin\status.py?sno=<?=$row['sno']?>">
           <input src="on.png" type="image" width="40px" height="19px" name="status">
          </a>
        <?php
        }
        else
        {
        ?>
          <a href="\cgi-bin\status.py?sno=<?=$row['sno']?>">
           <input src="off.png" type="image" width="40px" height="19px" name="status">
          </a>
        <?php
        }
        ?>
    </td>
	
    <td width="5%">
      <a href="edit.php?sno=<?=$row['sno']?>">
       <center><input src="edit.png" type="image" width="25px" height="20px" name="edit"></center>
      </a>
    </td>
	
    <td width="5%">
      <?php
      if($row['username']!='admin')
      {
      ?>
      <a href="\cgi-bin\delete.py?sno=<?=$row['sno']?>">
       <center><input type="image" src="delete.png" width="45px" height="17px" name="delete"></center>
      </a>
      <?php
      }
      ?>
    </td>

    
  </tr>
  <?php
  $a=$a+1;
  }
  ?>

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
