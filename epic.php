<?php

session_start();
 
$_SESSION['user'] = NULL;
$_SESSION['db'] = NULL;
if (file_exists('config.php')) {
  include_once 'config.php';
} else {
  echo "config.php not found, please execute config.pl to generate config file<br />\n";
  exit;
}

$gen->set_title("Test");
$gen->add_content("<div>Miau</div>");

$db->prepare("SELECT * FROM _genre WHERE name = ?;");
$db->exe_prepare("s", "Western");

while($ar = $db->get_next_result("Genre")) {
	echo "{$ar->getIndex()}   {$ar->getGenre()}<br>";
}

$gen->print_html();

$db->close();
?>
