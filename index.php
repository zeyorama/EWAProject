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
    
    <div id="wrapper">
      
      <div id="navi">
        <?php include 'partial/_nav.php'; ?>
      </div>
      
      <div id="yielded">
        <?php
          if (!isset($_GET['impress'])) {
        ?>
        <p>
          Lorem ipsum dolor sit amet consectetuer mi interdum dolor Pellentesque hendrerit. Leo vitae.<br>
          <br>
          Malesuada lorem laoreet Curabitur facilisi Phasellus Cum lacinia quis condimentum pellentesque.<br>
          <br>
          Pellentesque Phasellus mi rutrum Nam gravida eros hendrerit massa consequat.<br>
          <br>
          Quisque senectus Donec condimentum cursus semper pellentesque nunc tincidunt consectetuer et.<br>
          <br>
          Die meisten Unfälle passieren in Haushalten, die meisten Haushalte passieren durch Unfälle.<br>
        </p>
        <?php
          } else {
            include 'partial/_impress.html';
          }
        ?>
      </div>
      
    </div>
    
    <div id="footer">
      <a href="index.php?impress">Impressum</a>
    </div>
  </body>
</html>
