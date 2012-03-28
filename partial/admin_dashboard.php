<div id="board">

<div id="new_User">
  <table id="dashboard_table">
    <colgroup>
      <col width="330px">
      <col width="330px">
      <col width="330px">
    </colgroup>
    <tr>
      <td>
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
              <a id="new_a" href="adminWorks.php?delete&uid=<?php echo $tmp->getId(); ?>">delete</a></td>
            </tr>
<?php
  }
?>
        </table>
<?php
  } else { echo '<p>No new users</p>'; }
?>
      <td>
<?php
  $db->query('SELECT * FROM _video WHERE locked=1;');
  
  if ($db->get_length() >= 1) {
    echo '<p>New videos created</p>';
?>
        <table>
          <colgroup>
            <col>
            <col>
            <col>
          </colgroup>
          <tr align="left">
            <th>name</th>
            <th>release date</th>
          </tr>
<?php
  while ($tmp = $db->get_next_result('Video')) {
?>
            <tr>
              <td><?php echo "<a href='admin.php?video={$tmp->getId()}'>{$tmp->getName()}</a>"; ?></td>
              <td><?php echo $tmp->getRelease(); ?></td>
              <td><a id="new_a" href="admin.php?user=<?php echo $tmp->getId(); ?>">show</a>&nbsp;
              <a id="new_a" href="unlock.php?v=<?php echo $tmp->getId(); ?>">unlock</a>&nbsp;
              <a id="new_a" href="adminWorks.php?delete&vid=<?php echo $tmp->getId(); ?>">delete</a></td>
            </tr>
<?php
  }
?>
        </table>
<?php
  } else { echo '<p>No new videos</p>'; }
?>
      <td>
<?php
  $db->query('SELECT * FROM _event WHERE locked=1;');
  
  if ($db->get_length() >= 1) {
    echo '<p>New events created</p>';
?>
        <table>
          <colgroup>
            <col width="150px">
            <col width="50px">
            <col width="100px">
          </colgroup>
          <tr align="left">
            <th>name</th>
            <th>start date</th>
          </tr>
<?php
  while ($tmp = $db->get_next_result('Event')) {
?>
            <tr>
              <td><?php echo "<a href='admin.php?event={$tmp->getId()}'>{$tmp->getName()}</a>"; ?></td>
              <td><?php echo $tmp->startDate(); ?></td>
              <td><a id="new_a" href="admin.php?event=<?php echo $tmp->getId(); ?>">show</a>&nbsp;
              <a id="new_a" href="unlock.php?e=<?php echo $tmp->getId(); ?>">unlock</a>&nbsp;
              <a id="new_a" href="adminWorks.php?delete&eid=<?php echo $tmp->getId(); ?>">delete</a></td>
            </tr>
<?php
  }
?>
        </table>
<?php
  } else { echo '<p>No new events</p>'; }
?>
      </td>
    </tr>
  </table>
</div>

</div>
