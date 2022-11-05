<?php
  //first,check if the login cookie is set
  //if not direct back to admin.php
  if (!isset($_COOKIE['login'])) {
    header("Location: admin.php");
    exit();
  }
  // before we load the page we need to load in our 'config.php' file
  // this file contains PHP variables that our page will need to access,
  // such as the file path of the 'data' folder
  include('config.php');
  $file_name = $file_path."/adminlog.txt";
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
          <li><a href="about.php" class="navlink">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <li><a href="admin.php" class="navlink active">Admin</a></li>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          Admin Report
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
        <?php
          $history = file_get_contents($file_name);
          $history = trim($history);
          $split_history = explode("\n",$history);
          foreach ($split_history as $key => $value) {
            $split_history[$key] = explode(",", $split_history[$key]);
          }
          ?>
          <table style="text-align: center;" cellspacing="10px;">
            <tr>
              <th>Time</th>
              <th>Username</th>
              <th>Action</th>
            </tr>
          <?php
            foreach ($split_history as $key => $value) {
              print("<tr><td>".date('Y-m-d H:i:s', $split_history[$key][0])."</td><td>".$split_history[$key][1]."</td><td>".$split_history[$key][2]."</td></tr>");
            }
          ?>
          </table>
          <?php
        ?>
        </div>
      </div>
    </div>
  </body>
</html>