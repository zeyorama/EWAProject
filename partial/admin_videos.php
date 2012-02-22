<?php
  global $db;
  $db->query("SELECT * FROM _video ORDER BY video_id;");
 
  while ($video = $db->get_next_result('Video')) {
  $videos[] = $video;
  }
?>
<div id="board">

<div id="new">
  <a href="admin.php?video&new"><p id="navItem">New Video</p></a>
</div>

<table id="info">
  <colgroup>
    <col width="75px"> <!-- id -->
    <col width="400px"> <!-- title -->
    <col width="95px"> <!-- duration -->
    <col width="250px"> <!-- genre -->
    <col> <!-- link -->
  </colgroup>
  <tr>
    <th>id</th>
    <th>title</th>
    <th>duration</th>
    <th>genre</th>
  </tr>
<?php
  foreach ($videos as $v) {
?>
  <tr>
    <td><?php echo $v->getId(); ?></td>
    <td><?php echo $v->getTitle(); ?></td>
    <td><?php echo $v->getDuration(); ?></td>
    <td>
      <?php
        $g = $v->getGenre();
        if ($g == NULL) {
          echo 'undef';
        } else {
          echo $g->getGenre();
        }
      ?>
    </td>
    <td><?php echo "<a href='admin.php?video={$v->getId()}'>show</a>"; ?></td>
  </tr>
<?php
  }
?>
</table>

</div>
