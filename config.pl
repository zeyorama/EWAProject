#!usr/bin/perl -w

use strict;
use Cwd qw(fastgetcwd);

my ($cf, $path); # config file

# config file
$cf = 'config.php';

# create and write config file
system('rm config.php');
system('touch config.php');

open(_F, ">$cf");
  print(_F "<?php\n");

  print(_F "include_once 'lib/cDatabase.php';\n");
  print(_F "include_once 'lib/cGenerator.php';\n");
  print(_F "include_once 'lib/cGenre.php';\n");
  print(_F "include_once 'lib/cUser.php';\n");

  print(_F "\$db = Database::instance();\n");
  print(_F "\$db->connect(\"ewaproject\", \"ewa_pass\", \"ewaproject\");\n");
  print(_F "\$gen = Generator::instance();\n");
  print(_F "?>\n");
close(_F);
