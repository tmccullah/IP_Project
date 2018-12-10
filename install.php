<!--
All eode is under the GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007.
-->

<?php

include ("config.php");

// connect to the mysql server
$link = mysql_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysql_select_db($db_name)
or die ("Could not select database because ".mysql_error());

// create table on database
$create = "create table if not exists $db_table (
id smallint(5) NOT NULL auto_increment,
username varchar(30) NOT NULL,
password varchar(32) NOT NULL,
email varchar(200) NOT NULL,
admin boolean,
PRIMARY KEY (id),
UNIQUE KEY username (username)
);
";

$todo = "create table if not exists todo (
id smallint(5) NOT NULL auto_increment,
username varchar(30) NOT NULL,
title varchar(30) NOT NULL,
due datetime,
PRIMARY KEY (id)
);";

$wishlist = "create table if not exists wishlist (
id smallint(5) NOT NULL auto_increment,
username varchar(30) NOT NULL,
title varchar(30) NOT NULL,
due datetime,
PRIMARY KEY (id)
);";

$messages = "create table if not exists messages (
admin boolean,
message text NOT NULL,
date text NOT NULL
);";

$homework = "create table if not exists homework (
id smallint(5) NOT NULL auto_increment,
username varchar(30) NOT NULL,
title varchar(30) NOT NULL,
due datetime,
PRIMARY KEY (id)
);";



$build =  array($create, $todo, $wishlist, $messages, $homework);
foreach ($build as &$table) {
    mysql_query($table)
    or die ("Could not create tables because ".mysql_error());
    echo "Complete.";
}

?>
