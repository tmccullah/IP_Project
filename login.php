<?php

include("config.php"); 

// connect to the mysql server
$link = mysql_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysql_select_db($db_name)
or die ("Could not select database because ".mysql_error());

$match = "select id from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$name = "select username from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$isAdmin = "select admin from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$admin_test = mysql_query($isAdmin)
or die ("Could not match data because ".mysql_error());

// maybe change to ONLY if it works, do this
/*
$row = mysql_result($admin_test, 0);
if ($row == 0){
    $admin = 0;
}else{
    $admin = 1;
}
*/

$qry = mysql_query($match)
or die ("Could not match data because ".mysql_error());
$num_rows = mysql_num_rows($qry); 


$namequery = mysql_query($name)
or die ("Could not match data because ".mysql_error());
//$username = mysql_result($namequery, 0);
$username = $_POST['username'];

if ($num_rows <= 0) { 
    
    echo "
<!DOCTYPE html>
<html>
<head>
<!-- Page Title -->
<title>Login | WebSiteName</title>
<!-- Import Bootstrap from CDN-->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
<!--Extra Theme-->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' integrity='sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp' crossorigin='anonymous'>

<!--Import jQuary from CDN-->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>

<!-- Extra CSS -->
<style>
.text-center {
  text-align: center;
}
body {
  margin-top: 100px;
  background: #eeeeee;
}
</style>
</head>
<body>
<div class='container'>
  <div class='row'>
    <div class='col-md-4'></div>
    <div class='col-md-4'>
      <div class='panel panel-primary'>
        <div class='panel-heading text-center'><h4>Login</h4></div>
		<div class='panel-body'>
		<form action='login.php' method='post'>
          <div class='form-group'>
            <label for='usr'>Username:</label>
            <input type='text' name='username' placeholder='Username' class='form-control' id='usr'>
          </div>
          <div class='form-group'>
            <label for='pwd'>Password:</label>
            <input type='password' name='password' placeholder='Password' class='form-control' id='pwd'>
          </div>
        <input type='submit' class='btn btn-primary' value='Login'><p style='float: right;'>Don't have an account? <a href='register.html'>Register!</a></p>
        </form><center>";
echo "<br><br>Sorry, there is no username ".$username." <br> with the specified password. ";
echo "<a href=login.html>Try again</a></center></div></div></div></div></div></body></html>";
exit; 
} 
else 
{
    $row = mysql_result($admin_test, 0);
    if ($row == 0){
        $admin = 0;
    }else{
        $admin = 1;
    }
    setcookie("loggedin", "TRUE", time()+(3600 * 24));
    setcookie("site_username", "$username");
    setcookie("site_admin", $admin);
    
    header('Location: members.php');
}
?>
