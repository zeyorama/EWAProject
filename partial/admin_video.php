<?php
  global $db;
  $id = $_GET['video'];
  
  $db->query("SELECT * FROM _video WHERE video_id = $id;");
  $a_video = $db->get_next_result('Video');
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
      <td><?php echo $a_video->getId(); ?></td>
    </tr>
    <tr>
      <th>Title</th>
      <td><?php echo $a_video->getTitle(); ?></td>
    </tr>
    <tr>
      <th>Duration</th>
      <td><?php echo $a_video->getDuration(); ?></td>
    </tr>
    <tr>
      <th>Release date</th>
      <td><?php echo $a_video->getRelease(); ?></td>
    </tr>
    <tr>
      <th>Genre</th>
      <td><?php echo $a_video->getGenre()->getGenre(); ?></td>
    </tr>
    <tr>
      <th>FSK</th>
      <td><?php echo $a_video->getFSK(); ?></td>
    </tr>
  </table>
</div>
<div id="rightItem">
</div>
<div id=clearer></div>
</div>
