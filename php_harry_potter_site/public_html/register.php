<?php
  // before we load the page we need to load in our 'config.php' file
  // this file contains PHP variables that our page will need to access,
  // such as the file path of the 'data' folder
  include('config.php');
?>
<!doctype html>
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
          <li><a href="about.php" class="navlink">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <li><a href="admin.php" class="navlink">Admin</a></li>
          <?php 
            if(!isset($_COOKIE['login'])){
              ?>
              <li><a href="register.php" class="navlink active">Register</a></li>
              <?php
            }
          ?>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          Register
        </div>
        <?php
          $alert_text = file_get_contents($file_path.'/alert.txt');
          if($alert_text != ''){
            print("<div id='alert'>");
            print($alert_text);
            print("</div>");
          }
        ?>
        <div id="content">
          <form method="POST" action="process_register.php">
            First name:<br>
            <input type="text" name="new_firstname" placeholder="Must be alphabetic"><span style="color: blue">*</span>
            <?php 
              if($_GET["error_firstname"]=="true"){
                print("<strong style='color:red'>invalid first name</strong>");
              } 
            ?><br>
            Last name:<br>
            <input type="text" name="new_lastname" placeholder="Must be alphabetic"><span style="color: blue">*</span>
            <?php 
              if($_GET["error_lastname"]=="true"){
                print("<strong style='color:red'>invalid last name</strong>");
              } 
            ?><br>
            Username:<br>
            <input type="text" name="new_username" placeholder="Must be unique"><span style="color: blue">*</span>
            <?php 
              if($_GET["error_username"]=="same"){
                print("<strong style='color:red'>username already exist</strong>");
              }elseif ($_GET["error_username"]=="space") {
                print("<strong style='color:red'>cannot contain white space</strong>");
              }elseif ($_GET["error_username"]=="true"){
                print("<strong style='color:red'>must be alpahnumeric</strong>");
              }
            ?><br>
            Password:<br>
            <input type="text" name="new_password" placeholder="Must be alpahnumeric"><span style="color: blue">*</span>
            <?php 
              if($_GET["error_firstname"]=="true"){
                print("<strong style='color:red'>must be alpahnumeric</strong>");
              } 
            ?><br>
            <br>
            <span style="color: blue">*</span>:required field<br><br>
            <input type="submit" value="Create Account">
            <?php 
              if($_GET["registererror"]=="empty"){
                print("<br><strong style='color:red;'>Please fill in all the required fields!</strong>");
              }
              if($_GET["register"]=="success"){
                print("<br><strong style='color:blue;'>You have successfully registered!</strong>");
              }
            ?>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>