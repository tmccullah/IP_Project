
<?php
			include("config.php"); 
            // connect to the mysql server
			$link = mysql_connect($db_host, $db_user, $db_pass)
			or die ("Could not connect to mysql because ".mysql_error());
			
			// select the database
			mysql_select_db($db_name)
			or die ("Could not select database because ".mysql_error());
            $results = mysql_query("select title, due from todo where username = '".$_COOKIE['site_username']."';");
            while($row = mysql_fetch_array($results)) {
            ?>
            
                <tr>
                    <td><?php echo $row['title']?></td>
                </tr>

            <?php
            }
            ?>