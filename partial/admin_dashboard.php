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
  $db->query('SELECT * FROM _user ORDER BY locked DESC LIMIT 5;');
  
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
              <td><a <?php if ($tmp->isAdmin()) { echo "id='admin_link_especial'"; } ?> href="admin.php?user=
              <?php echo $tmp->getId()?>"><?php echo $tmp->getNick() ?></a></td>
              <td><?php echo $tmp->registeredAt(); ?></td>
              <td><a id="new_a" href="admin.php?user=<?php echo $tmp->getId(); ?>">show</a>&nbsp;
              <?php if ($tmp->isLocked()) { ?>
                <a id="new_a" href="unlock.php?u=<?php echo $tmp->getId(); ?>">unlock</a>&nbsp;
              <?php } ?>
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
  $db->query('SELECT * FROM _video ORDER BY video_id DESC LIMIT 5;');
  
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
              <td><?php echo "<a href='admin.php?video={$tmp->getId()}'>{$tmp->getTitle()}</a>"; ?></td>
              <td><?php echo $tmp->getRelease(); ?></td>
              <td><a id="new_a" href="admin.php?user=<?php echo $tmp->getId(); ?>">show</a>&nbsp;
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
  $db->query('SELECT * FROM _event ORDER BY event_id DESC LIMIT 5;');
  
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
