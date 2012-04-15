#!usr/bin/perl -w

use strict;

my ($cf, $path, $ewaUser, $ewaPass, $dbRoot, $dbPass, $userCreate); # config file

print("EWAProject configurator\nSetting up MySQL database:\nTell me your root user[root]:");
$dbRoot = <STDIN>;
chomp($dbRoot);
if ($dbRoot eq "") {
  $dbRoot = "root";
}

print("\nNow tell me please your root password:");
$dbPass = <STDIN>;
chomp($dbPass);
if ($dbPass eq "") {
  $dbPass = 'root';
}

print("\nGood. In few moments, your EWAProject database will be etablished,\n but before continue I need a new user to use in future\n[ewaproject]:");
$ewaUser = <STDIN>;
chomp($ewaUser);
if ($ewaUser eq "") {
  $ewaUser = "ewaproject";
} elsif ($ewaUser eq "root" || $ewaUser eq $dbRoot) {
  print("\n root user will not be used, 'ewaproject' will be used for project user!\n");
  $ewaUser = "ewaproject";
}

print("Last the password to access in future for '$ewaUser' [ewa_pass]:");
$ewaPass = <STDIN>;
chomp($ewaPass);
if ($ewaPass eq "") {
  $ewaPass = "ewa_pass";
}

$userCreate = "CREATE USER '$ewaUser'\@'%' IDENTIFIED BY '".$ewaPass."'; GRANT USAGE ON * . * TO '".$ewaUser."'\@'%' IDENTIFIED BY '".$ewaPass."' WITH 
MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;CREATE DATABASE ewaproject; GRANT ALL PRIVILEGES ON `ewaproject` . * TO '".$ewaUser."'\@'%';";

open(_F, ">seed/db.sql");
  print(_F "$userCreate");
close(_F);

open(_F, ">seed/user.sql");
  print("Type your admin user [admin]:");
  my $adminUser = <STDIN>;
  print("Now the password for $adminUser [EWAPASS]:");
  my $adminPass = <STDIN>;
  print("Email adress for Admin:");
  my $adminEmail = <STDIN>;
  chomp($adminPass);
  chomp($adminUser);
  chomp($adminEmail);
  print "Admin will be created with\n\t$adminUser -> $adminPass\n";
  print(_F "USE ewaproject;\n");
  print(_F "INSERT INTO _user(user_id,nick,pass,email,created_at,admin,locked)\n");
  print(_F "VALUES (1,'$adminUser',md5('".$adminPass."'),'$adminEmail',current_timestamp,1,0);");
close(_F);

print("\n\nNice. Now the user and the Database will be etablished!\n");

system("mysql -u $dbRoot -p$dbPass <seed/clear.sql");
system("mysql -u $dbRoot -p$dbPass <seed/create.sql");
system("mysql -u $dbRoot -p$dbPass <seed/db.sql");
system("mysql -u $dbRoot -p$dbPass <seed/std_input.sql");
system("mysql -u $dbRoot -p$dbPass <seed/user.sql");

system("sleep 2");
system("rm seed/user.sql");
system("rm seed/db.sql");

# config file
$cf = 'config.php';

# create and write config file
system('rm config.php');
system('touch config.php');

open(_F, ">$cf");
  print(_F "<?php\n");

  print(_F "include_once 'lib/cDatabase.php';\n");
  print(_F "include_once 'lib/cMessage.php';\n");
  print(_F "include_once 'lib/cGenerator.php';\n");
  print(_F "include_once 'lib/cGenre.php';\n");
  print(_F "include_once 'lib/cUser.php';\n");
  print(_F "include_once 'lib/cEvent.php';\n");
  print(_F "include_once 'lib/cVideo.php';\n");
  print(_F "include_once 'lib/cUserVideo.php';\n");
  print(_F "include_once 'lib/cUserEvent.php';\n");
  print(_F "include_once 'lib/mLogin.php';\n");

  print(_F "\$db = Database::instance();\n");
  print(_F "\$db->connect(\"$ewaUser\", \"$ewaPass\", \"ewaproject\");\n");
  print(_F "# temporally not in use\n#\$gen = Generator::instance();\n");
  print(_F "?>\n");
close(_F);
system('clear');
print("Database, user and tables created. Have fun with EWAProject!\n\n");
