<div id="new_event">

<form action="new_event.php" method="POST">
<p>
  Name:<br>
  <input name="name"><br>
</p>
<p>
  Location:<br>
  <input name="location"><br>
</p>
<p>
  When will be the event begin?<br>
  <input name="start" value="<?= date('Y-m-d H:i:s'); ?>">&nbsp;&lt;Formate: yyyy-mm-dd hh:mm:ss&gt;<br>
</p>
<p>
  Insert the event description here:<br>
  <textarea name="description" style="width:250px;"></textarea><br>
</p>
<p>
  <input type="hidden" value="<?= unserialize($_SESSION['user'])->getId(); ?>" name="id">
  <input type="submit" value="Create"><br>
</p>
</form>

</div>
