<?php
  // before we load the page we need to load in our 'config.php' file
  // this file contains PHP variables that our page will need to access,
  // such as the file path of the 'data' folder
  include('config.php');
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Hogwarts School Management System</title>
    <link type="text/css" href="styles.css" rel="stylesheet" />
  </head>
  <body>
    <div id="container">
      <div id="leftcolumn">
        <img src="images/hogwarts_logo.png">
        <ul>
          <li><a href="index.php" class="navlink">Home</a></li>
          <li><a href="about.php" class="navlink active">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <li><a href="admin.php" class="navlink">Admin</a></li>
          <?php 
            if(!isset($_COOKIE['login'])){
              ?>
              <li><a href="register.php" class="navlink">Register</a></li>
              <?php
            }
          ?>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          About Our School
        </div>
        <?php
          if ($_COOKIE['login'] == "yes") {
              ?>
              <div id="welcome" style="background-color: yellow; font-size: 120%; padding: 15px;">
                <?php print("Welcome, ".$_COOKIE['firstname']." ".$_COOKIE['lastname']."!");?>
                <a href='logout.php'>Log out</a>
              </div>
            <?php
          }
          $alert_text = file_get_contents($file_path.'/alert.txt');
          if($alert_text != ''){
            print("<div id='alert'>");
            print($alert_text);
            print("</div>");
          }
        ?>
        <div id="content">
        <?php
          //bring in the "about.txt file"
          include($file_path.'/about.txt');
        ?>
        </div>
      </div>
    </div>
  </body>
</html>
