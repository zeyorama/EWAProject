<?php include_once 'epic.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta content="author" value="Markus Benjamin Kretsch">
    <meta content="author" value="Frank Kevin Zey">
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
          
          } else if (isset($_GET['profile'])) {
            include 'partial/_profile.php';
            
          } else if (isset($_GET['new_event'])) {
            include 'partial/_new_event.php';
            
          } else if (isset($_GET['messages'])) {
            include 'partial/_message.php';
            
          } else if (isset($_GET['events'])) {
            include 'partial/_event.php';
          
          } else {
            include 'partial/_index.php';
          }
        ?>
        </p>
      </div>
      
    </div>
    
    <div id="footer">
      <a href="index.php?impress">Impressum</a>
    </div>
  </body>
</html>
