<?php
  global $db;
  $id = $_GET['event'];
  
  $db->query("SELECT * FROM _event WHERE event_id = $id;");
  $a_event = $db->get_next_result('Event');
?>
<div id="board">

<div id="leftItem_table">
  <table id="a">
    <colgroup>
      <col width="120px">
      <col>
    </colgroup>
    <tr>
      <th>Id</th>
      <td><?php echo $a_event->getId(); ?></td>
    </tr>
    <tr>
      <th>Name</th>
      <td><?php echo $a_event->getName(); ?></td>
    </tr>
    <tr>
      <th>Location</th>
      <td><?php echo $a_event->getLocation(); ?></td>
    </tr>
    <tr>
      <th>Description</th>
      <td><?php echo $a_event->getDescription(); ?></td>
    </tr>
    <tr>
      <th>Date of beginning</th>
      <td><?php echo $a_event->startdate(); ?></td>
    </tr>
    <tr>
      <th>Owner</th>
      <td><a href="admin.php?user=<?php echo $a_event->Owner()->getId();?>"><?php echo $a_event->Owner()->getNick(); ?></td>
    </tr>
    <tr>
      <th>FSK</th>
      <td><?php echo $a_event->getFSK(); ?></td>
    </tr>
    <tr>
      <th>Count of visitors</th>
      <td><?php echo count($a_event->getAllVisitors()); ?></td>
    </tr>
  </table>
</div>
<div id="rightItem">
</div>
<div id=clearer></div>
</div>
