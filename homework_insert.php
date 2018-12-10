
<?php 

include("config.php"); 

// connect to the mysql server
$link = mysql_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysql_select_db($db_name)
or die ("Could not select database because ".mysql_error());

// insert the data
$insert = mysql_query("insert into homework values ('NULL',
'".$_COOKIE['site_username']."',
'".$_POST['title']."',
'".$_POST['due']."')")
or die("Could not insert data because ".mysql_error());

header('Location: homework.php');
?>