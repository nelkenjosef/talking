<?php
include '../entity/User.php';

$user = new Entity\User();
$user->setFirstName('Max');
$user->setLastName('Mustermann');
$user->setGender(0);
$user->setNamePrefix('Prof. Dr.');

echo $user->assembleDisplayName() . PHP_EOL;
