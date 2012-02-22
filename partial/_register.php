<p>
<?php

if (isset($_SESSION['err']))
  echo $_SESSION['err'];
  unset ($_SESSION['err']);
?>
</p>

<div id="register">

<h3>EWAProject registration</h3>
<br>
<form action='register.php' method="POST">

<p>
  Enter your wanted nick name<br>
  <input name="nick"><span>at least 5 chars</span>
</p>

<p>
  Enter your email address<br>
  <input name="email">
</p>

<p>
  Your wanted password<br>
  <input type="password" name="pass"><span>at least 5 chars</span>
</p>

<input type="submit" value="Submit">

</form>

</div>
