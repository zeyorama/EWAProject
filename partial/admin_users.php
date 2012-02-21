<?php
  global $db;
  $db->query("SELECT * FROM _user ORDER BY user_id;");
 
  while ($user = $db->get_next_result('User')) {
  $users[] = $user;
  }
?>
<div id="board">

<table id="info">
  <colgroup>
    <col width="75px"> <!-- id -->
    <col width="350px"> <!-- nick -->
    <col width="50px"> <!-- locked -->
    <col width="50px"> <!-- admin -->
    <col> <!-- link -->
  </colgroup>
  <tr>
    <th>id</th>
    <th>username</th>
    <th>state</th>
    <th>admin?</th>
  </tr>
<?php
  foreach($users as $u) {
?>
  <tr>
    <td><?php echo $u->getId(); ?></td>
    <td><?php echo $u->getNick(); ?></td>
    <td>
    <?php
    if (true) { ($u->isLocked()) ?>
      <img src="images/kay.png">
    <?php } else { ?>
      <img src="images/x.png">
    <?php } ?>
    </td>
    <td>
    <?php
    if (true) { ($u->isAdmin()) ?>
      <img src="images/kay.png">
    <?php } else { ?>
      <img src="images/x.png">
    <?php } ?>
    </td>
    <td><?php echo "<a href='admin.php?user={$u->getId()}'>show</a>"; ?></td>
  </tr>
<?php
  }
?>
</table>

</div>
