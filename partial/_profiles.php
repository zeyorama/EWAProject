<?php
  global $db;
  $db->query("SELECT * FROM _user;");
  
  while ($user = $db->get_next_result('User')) {
    $users[] = $user;
  }
?>
<div id="profile_list">

HIER KOMMT NE LISTE MIT ALLEN USERN HIN
<table>
  <colgroup>
    <col width="200px">
    <col width="100px">
  </colgroup>
  <tr>
    <th align="left">Nickname</th>
    <th align="left">Eventcount</th>
  </tr>
<?php foreach($users as $u) { ?>
<?php
    if (!(!$u->isLocked() && !$u->isAdmin())) {
      $nick = $u->getNick();
?>
  <tr>
    <td><a href="index.php?profile=<?php echo $nick; ?>"><?php echo $nick; ?></a></td>
    <td><?php echo count($u->getEvents()); ?></td>
    <td><?php if ($u->isAdmin()) { echo 'admin'; } ?></td>
  </tr>
<?php
    }
  }
?>
</table>

</div>
