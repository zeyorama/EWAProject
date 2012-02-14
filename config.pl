#!usr/bin/perl -w

use strict;
use Cwd qw(fastgetcwd);

my ($cf, $path); # config file

# config file
$cf = 'config.php';

# get current path to set as root
# directory for project
# using fastgetcwd to get the current working directory
$path = fastgetcwd();


# store all config relevant informations
my $current_path = "$path/";

# create and write config file
system('rm config.php');
system('touch config.php');

open(_F, ">$cf");
  print(_F "<?php\n");
  print(_F "\$_SESSION['root'] = '$current_path';\n");
  print(_F "?>\n");
close(_F);
