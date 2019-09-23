<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
if(isset($_SESSION['user']))
$user=($_SESSION['user']);
else
$user='';
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<style>
.button
{
  background-color: red;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.navbar-default {
  background-color: #69899f;
  border-color: #425766;
}
.navbar-default .navbar-brand {
  color: #d7e2e9;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
  color: #e5dbdb;
}
.navbar-default .navbar-text {
  color: #d7e2e9;
}
.navbar-default .navbar-nav > li > a {
  color: #d7e2e9;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: #e5dbdb;
}
.navbar-default .navbar-nav > li > .dropdown-menu {
  background-color: #69899f;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
  color: #d7e2e9;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
  color: #e5dbdb;
  background-color: #425766;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
  background-color: #69899f;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color: #e5dbdb;
  background-color: #425766;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  color: #e5dbdb;
  background-color: #425766;
}
.navbar-default .navbar-toggle {
  border-color: #425766;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #425766;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #d7e2e9;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #d7e2e9;
}
.navbar-default .navbar-link {
  color: #d7e2e9;
}
.navbar-default .navbar-link:hover {
  color: #e5dbdb;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #d7e2e9;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #e5dbdb;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #e5dbdb;
    background-color: #425766;
  }
}
</style>
</head>
<body style="background-color: rgb(220, 220, 220);">
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->





    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Digital Image Processing <span class="sr-only"></span></a></li>
		<?php
		 if(isset($_SESSION['user']))
		 {
            if($user=="admin")
            {
                $_SESSION['success']='yes';
        ?>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addaccount.php">Create</a></li>
            <li><a href="manage.php">Manage</a></li>
          </ul>
         </li>
		<?php
            }
        ?>
		
		
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recognize <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="recognize.php">Add/Manage</a></li>
          </ul>
         </li>


		 <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Font <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="upload.php">Add</a></li>
          </ul>
         </li>
      </ul>	  
        <?php
         }
           		 
		?>
	  <ul class="nav navbar-nav navbar-right">
		<?php
		 if(isset($_SESSION['user']))
			 {
		?>
				 <li><a href="logout.php">Logout</a></li>
		<?php
			 }
		else
		{
		?>
				 <li><a href="loginform.php">Login</a></li>
		<?php
		 }
		?>
		
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<p align="center"><b><font face="Arial" size="5">Welcome <?=$user?></font></b></p>
</body>
</html>
</html>

