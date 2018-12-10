
<!DOCTYPE html>
<html>
<head>
<!-- Import Bootstrap from CDN-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--Extra Theme-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!--Import jQuary from CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Extra CSS -->
<style>
.text-right {
  float: right;
}
body {
  background: #eeeeee;
}
</style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TeacherConnect</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="todo.php">To-Do</a></li>
      <li><a href="wishlist.php">Wishlist</a></li>
      <li><a href="messageBoard.php">Message Board</a></li> 
        <li><a href="homework.php">Homework</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.html"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-primary"> 
	     <div class="panel-heading">Welcome!</div>
		 <div class="panel-body" id = "hello-there">
		    <script>
          function readCookie(name) {
          var nameEQ = name + "=";
          var ca = document.cookie.split(';');
          for(var i=0;i < ca.length;i++) {
          var c = ca[i];
          while (c.charAt(0)==' ') c = c.substring(1,c.length);
          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
          }
              return null;
          }
          
        
          document.getElementById('hello-there').innerHTML = "<h1>Hi there " + readCookie('site_username') +"!</h1>";
        </script>
         <?php
      			include("config.php"); 
                  // connect to the mysql server
      			$link = mysql_connect($db_host, $db_user, $db_pass)
      			or die ("Could not connect to mysql because ".mysql_error());
      			
      			// select the database
      			mysql_select_db($db_name)
      			or die ("Could not select database because ".mysql_error());
                  $result = mysql_query("Select count(*) as total from todo where due > NOW()");
             // $result = mysql_query("Select count(*) as total from todo where username = '".$_COOKIE['site_username']."' and due > NOW()");
                  if ($result){
                        echo '<div class="alert alert-info">';
                         echo  '<strong><span class="glyphicon glyphicon-ok"></span>  Todo!</strong> you have <strong>"'.mysql_result($result, 0).'"</strong> new todo items.';
                        echo '</div>';
                  }
                  
                  $result = mysql_query("Select count(*) as total from wishlist");
            // $result = mysql_query("Select count(*) as total from wishlist where username = '".$_COOKIE['site_username']."' ");
                  if ($result){
                        echo '<div class="alert alert-info">';
                         echo  '<strong><span class="glyphicon glyphicon-star"></span>  Wishlist!</strong> you have <strong>"'.mysql_result($result, 0).'"</strong> total wishlist items.';
                        echo '</div>';
                  }
                  
                  $result = mysql_query("Select count(*) as total from messages");
             // $result = mysql_query("Select count(*) as total from messages where username = '".$_COOKIE['site_username']."' and date > NOW() ");
                  if ($result){
                        echo '<div class="alert alert-info">';
                         echo  '<strong><span class="glyphicon glyphicon-envelope"></span>  Messages!</strong> you have <strong>"'.mysql_result($result, 0).'"</strong> messages.';
                        echo '</div>';
                  }
                  
                  $result = mysql_query("Select count(*) as total from homework");
             // $result = mysql_query("Select count(*) as total from homework where username = '".$_COOKIE['site_username']."' ");
                  if ($result){
                        echo '<div class="alert alert-danger">';
                         echo  '<strong><span class="glyphicon glyphicon-inbox"></span>  Homework!</strong> you have <strong>"'.mysql_result($result, 0).'"</strong> homework assignments.';
                        echo '</div>';
                  }
          
          ?>

          

		 </div>
      </div>
    </div>
	<div class="col-md-3">
	  <div class="panel panel-primary"> 
	    <div class="panel-heading">Notes</div>
	    <div class="panel-body">
      Welcome to the homepage of Teacher Connect! Please browser the tabs to stay up-to-date on the to-do list, wishlist, and/or homework items. You may even chat in real-time with the teachers and parents!
	    </div>
      </div>
	</div>
  </div>
<!-- Copyright & Credits bar-->
<div class="panel panel-primary">
<div class="panel-heading">Copyright &copy; <a href="#"><font color="black">Alex,Brent, Tori</font></a> 2018, All Rights Reserved.</div>
</div>
</div>
</body>
</html>
