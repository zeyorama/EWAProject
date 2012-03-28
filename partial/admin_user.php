<?php
  global $db;
  $id = $_GET['user'];
  
  $db->query("SELECT * FROM _user WHERE user_id = $id;");
  $a_user = $db->get_next_result('User');
?>
<div id="board">

<div id="leftItem_table">
  <table id="a_user">
    <colgroup>
      <col width="120px">
      <col>
    </colgroup>
    <tr>
      <th>Id</th>
      <td><?php echo $a_user->getId(); ?></td>
    </tr>
    <tr>
      <th>Nick</th>
      <td><?php echo $a_user->getNick(); ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $a_user->getMail(); ?></td>
    </tr>
    <tr>
      <th>Admin?</th>
      <td><?php
      if ($a_user->isAdmin()) { ?>
        <img src="images/kay.png">
      <?php } else { ?>
        <img src="images/x.png">
      <?php } ?>
      </td>
    </tr>
    <tr>
      <th>Access</th>
      <td><?php
      if ($a_user->isLocked()) { ?>
        <img src="images/x.png">
      <?php } else { ?>
        <img src="images/kay.png">
      <?php } ?>
      </td>
    </tr>
    <tr>
      <th>Created at</th>
      <td><?php echo $a_user->registeredAt(); ?></td>
    </tr>
    <tr>
      <th>Last signin</th>
      <td><?php echo $a_user->lastSignIn(); ?></td>
    </tr>
  <?php
    
  ?>
  </table>
</div>
<div id="rightItem">
  <?php if (!($a_user->isAdmin())) { ?>
  <form action="adminWorks.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $a_user->getId(); ?>">
    <input type="hidden" name="admin" value="<?php $admin = 1 - $a_user->isAdmin(); echo $admin; ?>">
    <input type="submit" value="change Role">
  </form>
  <?php } ?>
  <?php if (!($a_user->isAdmin())) { ?>
  <form action="adminWorks.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $a_user->getId(); ?>">
    <input type="hidden" name="lock" value="<?php $lock = 1 - $a_user->isLocked(); echo $lock; ?>">
    <input type="submit" value="change Lock">
  </form>
  <?php } ?>
</div>
<div id=clearer></div>
</div>
