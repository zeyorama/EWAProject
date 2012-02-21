<?php

  if (!signed_in()) {
  
?>
  <form action="login.php" method="POST">
<?php
  
  if (isset($_SESSION['err'])) {
    
    echo $_SESSION['err'];
    
    unset($_SESSION['err']);
  
  }
  
?>    
    <input size="10" value="username" name="nick" type="text" id="txt">
    <input size="10" value="password" name="pass" type="password" id="txt">
    <input type="submit" value="Login" id="txt">
    &nbsp;&nbsp;&nbsp;
    <a href="index.php?register">Register</a>&nbsp;
    </form>
<?php
  
  } else {

?>
  <a href="index.php?profile=<?php echo unserialize($_SESSION['user'])->getNick();?>"> <?php echo unserialize($_SESSION['user'])->getNick(); ?> </a>&nbsp;&nbsp;<a href="logout.php">Logout</a>
<?php  

  }

?>

