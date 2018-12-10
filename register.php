
<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Login | WebSiteName</title>
    
    <!-- Import Bootstrap from CDN-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--Extra Theme-->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!--Import jQuary from CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Extra CSS -->
    <style>
        .text-center 
        {
            text-align: center;
        }
        body 
        {
            margin-top: 100px;
            background: #eeeeee;
        }
    </style>
</head>
    
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center"><h4>Login</h4></div>
                    <div class="panel-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="usr">Username:</label>
                                <input type="text" name="username" placeholder="Username" class="form-control" id="usr">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" id="pwd">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Login"><p style="float: right;">
                            
                            
                            <?php 

                                include("config.php"); 

                                // connect to the mysql server
                                $link = mysql_connect($db_host, $db_user, $db_pass)
                                    or die ("Could not connect to mysql because ".mysql_error());

                                // select the database
                                mysql_select_db($db_name)
                                    or die ("Could not select database because ".mysql_error());

                                // check if the username is taken
                                $check = "select id from $db_table where username = '".$_POST['username']."';";
                                $qry = mysql_query($check) or die ("Could not match data because ".mysql_error());
                                $num_rows = mysql_num_rows($qry); 

                                if ($num_rows != 0) 
                                { 
                                    echo "Sorry, there the username $username is already taken.<br>";
                                    echo "<a href=register.html>Try again</a>";
                                    exit; 
                                } 
                                else 
                                {
                                    // insert the data
                                    $role;
                                    if (!isset($_POST['role']))
                                        $role = 0;
                                    else
                                        $role = $_POST['role'];
                                    $insert = mysql_query("insert into $db_table values ('NULL', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$role."')") 
                                        or die("Could not insert data because ".mysql_error());

                                    // print a success message
                                    echo "Your user account has been created!<br>"; 
                                    echo "Now you can <a href='login.html'>log in</a>"; 
                                }

                            ?>
                        
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>