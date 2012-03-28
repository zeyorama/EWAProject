<?php include_once 'epic.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta content="author" name="Markus Benjamin Kretsch">
    <meta content="author" name="Frank Kevin Zey">
    <link href="styles/formate.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="head_background">
      EWAProject  <font id="re">We etablish your Events!</font>
    </div>
    
    <div id="login">
      <?php include 'partial/_login_head.php';?>
    </div>
    
    <div id="wrapper">
      
      <div id="navi">
        <?php include 'partial/_nav.php'; ?>
      </div>
      
      <div id="yielded">
        <noscript>
          To get all functions of this site, you need to activate JavaScript!
        </noscript>
        <p>
        <?php
          
          if (isset($_GET['impress'])) {
            include 'partial/_impress.html';
          
          } else if (isset($_GET['register'])) {
              include 'partial/_register.php';
            
          } else if ($_SESSION['user'] != NULL) {
            if (isset($_GET['profile'])) {
              include 'partial/_profile.php';
              
            } else if (isset($_GET['profiles'])) {
              include 'partial/_profiles.php';
              
            } else if (isset($_GET['new_event'])) {
              include 'partial/_new_event.php';
              
            } else if (isset($_GET['new_message'])) {
              include 'partial/_new_message.php';
              
            } else if (isset($_GET['messages'])) {
              include 'partial/_message.php';
              
            } else if (isset($_GET['events'])) {
              include 'partial/_event.php';
            
            } else if (isset($_GET['video'])) {
              include 'partial/_video.php';
            
            } else if (isset($_GET['add_video'])) {
              include 'partial/_add_video.php';

            } else {
              include 'partial/_index.php';
            }

          } else {
            include 'partial/_index.php';
          }
        ?>
        </p>
      </div>
      
    </div>
    
    <div id="footer">
      <br><br><br>
      <a href="index.php?impress">Impressum</a>
    </div>
  </body>
</html>
