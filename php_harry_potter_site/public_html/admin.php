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
    <link type="text/css" href="styles.css" rel="stylesheet">
  </head>
  <body>
    <div id="container">
      <div id="leftcolumn">
        <img src="images/hogwarts_logo.png">
        <ul>
          <li><a href="index.php" class="navlink">Home</a></li>
          <li><a href="about.php" class="navlink">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <li><a href="admin.php" class="navlink active">Admin</a></li>
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
          Welcome to Hogwarts
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
            if ($_GET['loginerror']) {
             print("<p style='color:red'>Log in failed!</p>");
            }
            if ($_COOKIE['login'] == "yes") {
              if ($_COOKIE['identity'] == "admin"){
              ?>
                <!-- <a href="logout.php">Log out</a> -->
                <br><a href="admin_report.php">Admin Report</a><br><br>
                <form method="POST" action="updatecontent.php">
                  Home:<br>
                  <textarea name="text_home"><?php include($file_path.'/home.txt'); ?></textarea><br>
                  About:<br>
                  <textarea name="text_about"><?php include($file_path.'/about.txt'); ?></textarea><br>
                  Policies:
                  <textarea name="text_policies"><?php include($file_path.'/policies.txt'); ?></textarea><br>
                  Alert:
                  <textarea name="text_alert"><?php include($file_path.'/alert.txt'); ?></textarea><br>
                  <input type="submit">
                  <?php
                    if ($_GET["security"]=="failure") {
                      ?> <br><strong style="color: red;">You are not authenticated to make changes!</strong>
                      <?php
                    }
                  ?>
                </form>
              <?php
              }
            }
            else{
              ?>
              <form method="POST" action="login.php">
                Are you a student or an administrator?
                <select name="identity">
                  <option value="default">select an identity</option>
                  <option value="id_student">student</option>
                  <option value="id_admin">admin</option>
                </select><br><br>
                Username: <input type="text" name="username"><br><br>
                Password: <input type="text" name="password" style="margin-left: 7px"><br><br>
                <input type="submit">
              </form>
              <?php
            }
          ?>
          
        </div>
      </div>
    </div>
  </body>
</html>
