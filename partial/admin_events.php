<?php
  global $db;
  $db->query("SELECT * FROM _event ORDER BY event_id;");
  
  $events = array();
  $i = 0;
  
  while ($event = $db->get_next_result('Event')) {
    $events[$i++] = $event;
  }
?>
<div id="board">

<div id="new">
  <a href="admin.php?event&new"><p id="navItem">New Event</p></a>
</div>

<table id="info">
  <colgroup>
    <col width="75px"> <!-- id -->
    <col width="250px"> <!-- name -->
    <col width="150px"> <!-- owner -->
    <col width="75px"> <!-- count of visitors -->
    <col width="250px"> <!-- location -->
    <col> <!-- link -->
  </colgroup>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>owner</th>
    <th>visitors</th>
    <th>location</th>
  </tr>
<?php
  foreach ($events as $e) {
?>
  <tr>
    <td><?php echo $e->getId(); ?></td>
    <td><?php echo $e->getName(); ?></td>
    <td>
      <?php
        $user = $e->Owner();
        echo "<a href='admin.php?user={$user->getId()}'>{$user->getNick()}</a>";
      ?>
    </td>
    <td><?php 
	    	$c = count($e->getAllVisitors()); 
	    	echo "$c"; 
    	?></td>
    <td><?php echo $e->getLocation(); ?></td>
    <td><?php echo "<a href='admin.php?event={$e->getId()}'>show</a>"; ?></td>
  </tr>
<?php
  }
?>
</table>

</div>
