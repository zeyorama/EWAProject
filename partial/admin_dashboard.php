<div id="board">

<div id="new_User">
<?php
  $db->query('SELECT * FROM _user WHERE locked=1;');
  
  if ($db->get_length() >= 1) {
    echo '<p>New users registered</p>';
?>
  <table>
    <colgroup>
      <col>
      <col>
      <col>
    </colgroup>
    <tr align="left">
      <th>nick</th>
      <th>registered at</th>
    </tr>
<?php
  while ($tmp = $db->get_next_result('User')) {
?>
    <tr>
      <td><?php echo "<a href='admin.php?user={$tmp->getId()}'>{$tmp->getNick()}</a>"; ?></td>
      <td><?php echo $tmp->registeredAt(); ?></td>
      <td><a id="new_a" href="admin.php?user=<?php echo $tmp->getId(); ?>">show</a>&nbsp;
      <a id="new_a" href="unlock.php?u=<?php echo $tmp->getId(); ?>">unlock</a>&nbsp;
      <a id="new_a" href="admin.php?delete&user=<?php echo $tmp->getId(); ?>">delete</a></td>
    </tr>
<?php
  }
?>
  </table>
<?php
  } else { echo '<p>No new users</p>'; }
?>

</div>

</div>
