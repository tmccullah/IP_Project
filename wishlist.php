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
                    <li><a href="members.php">Home</a></li>
                    <li><a href="todo.php">To-Do</a></li>
                    <li class="active"><a href="wishlist.php">Wishlist</a></li>
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
                    <div class="panel-heading">Wish List</div>
                    <div class="panel-body">
                        <div id="teacher-only">
                            <div  id= "teacher-form"  class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Add to Wishlist Item</div>
                                    <div class="panel-body">
                                        <form action="wishlist_insert.php" method="post">

                                            <div class="form-group">
                                                <label for="title">Item</label>
                                                <input type="title" name="title" placeholder="ex: bring permisison slip" class="form-control" id="title">
                                            </div>

                                            <div class="form-group">

                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Send">


                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col">Sign-Up</th>
                                            <!--<th scope="col">Due-date</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <form>
                                        <?php
                                			include("config.php"); 
                                            // connect to the mysql server
                                			$link = mysql_connect($db_host, $db_user, $db_pass)
                                			or die ("Could not connect to mysql because ".mysql_error());
                                			
                                			// select the database
                                			mysql_select_db($db_name)
                                			or die ("Could not select database because ".mysql_error());
                                            $results = mysql_query("select title, DATE(due) as due  from wishlist order by due asc;");
                                            
                                            
                                            while($row = mysql_fetch_array($results)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['title']?></td>
                                                        <!--<td><?php echo $row['due']?></td>-->
                                                        <td><input type="checkbox" name="" value=""> Sign Up<br></td>
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                            
                                    
                                
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <script>
                            function hideDiv(divname) {
                                var x = document.getElementById(divname);
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                }
                                else {
                                    x.style.display = "none";
                                }
                            }

                            function readCookie(name) {
                                var nameEQ = name + "=";
                                var ca = document.cookie.split(';');
                                for (var i = 0; i < ca.length; i++) {
                                    var c = ca[i];
                                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                                }
                                return null;
                            }
                            console.log(readCookie('site_admin'));
                            if (readCookie('site_admin') === "0") {
                                hideDiv("teacher-form")
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Notes</div>
                    <div class="panel-body">
                        This is the wish list section, the teacher is able to add items to the wish list while parents can view the wish list but without any edit permissions.
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright & Credits bar-->
        <div class="panel panel-primary">
            <div class="panel-heading">Copyright &copy;
                <a href="#">
                    <font color="black">Alex,Brent, Tori</font>
                </a> 2018, All Rights Reserved.</div>
        </div>
</body>

</html>
