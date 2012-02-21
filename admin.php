<?php
  include_once 'epic.php';
  if (signed_in()) {
    if ( !( unserialize($_SESSION['user'])->isAdmin() ) ) {
      header("Location: index.php");
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta content="author" name="Markus Benjamin Kretsch">
    <meta content="author" name="Frank Kevin Zey">
    <link href="styles/admin.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="head_background">
      <a href='index.php'>EWAProject</a>  <font id="re">We etablish your Events!</font>
      <font id="re2">Administrationarea</font>
      <?php
      if (signed_in()) {
        if ( ( unserialize($_SESSION['user'])->isAdmin() ) ) {
          echo '<a href="logout.php"><p id="logout">Logout</p><a>';
        }
      } else {
        header('Location: 404.html');
      }
      ?>
      <hr>
    </div>
    
    <div id="navbar">
      <a href="admin.php"><p id="navItem">Dashboard</p></a>
      <a href="admin.php?users"><p id="navItem">User</p></a>
      <a href="admin.php?videos"><p id="navItem">Video</p></a>
      <a href="admin.php?events"><p id="navItem">Event</p></a>
      <!--
        <a href="admin.php?item"><p id="navItem">Item</p></a>
        Here are space for more nav items!
      -->
    </div>
    
    <div id="dashboard">
      <noscript>
        Please activate JavaScript for full functionallity!
      </noscript>
<?php

  if (isset($_GET['users'])) {
    include 'partial/admin_users.php'; # displays all users
  
  } else if (isset($_GET['videos'])) {
    include 'partial/admin_videos.php'; # displays all videos
  
  } else if (isset($_GET['events'])) {
    include 'partial/admin_events.php'; # displays all events
  
  } else if (isset($_GET['event'])) {
    include 'partial/admin_event.php'; # displays all events
  
  } else if (isset($_GET['user'])) {
    include 'partial/admin_user.php'; # displays all events
  
  } else if (isset($_GET['video'])) {
    include 'partial/admin_video.php'; # displays all events
  
  } else { # all unknown GET parameters will display dashboard
    include 'partial/admin_dashboard.php'; # displays dashboard
  
  }

?>
    </div>
    
    <div id="footer">
      <a href="index.php?impress" id="impress">Impressum</a>
      <br><br><br>
    </div>
  </body>
</html>
