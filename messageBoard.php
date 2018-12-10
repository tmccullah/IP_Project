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
                    <li ><a href="todo.php">To-Do</a></li>
                    <li><a href="wishlist.php">Wishlist</a></li>
                    <li class='active'><a href="messageBoard.php">Message Board</a></li>
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
                    <div class="panel-heading">Message Board</div>
                    <div class="panel-body">
                        
                        <iframe src='MessageTest/MessageBoard.php' height=500 width=100%></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Notes</div>
                    <div class="panel-body">
                        This is the message board section, the teacher and parents are allowed to send messages back and forth between one another.
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
        
    </div>
    
    
</body>

</html>