<?php

/**
 * File index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.2
 *
 */

include '../entity/User.php';
include '../mapper/User.php';

$db = new \PDO('sqlite:../../data/talking.sqlite');
$userData = $db->query('SELECT * FROM users WHERE id = 1;')->fetch();

$user = new Entity\User();
$userMapper = new Mapper\User();
$user = $userMapper->populate($userData, $user);

echo $user->assembleDisplayName() . PHP_EOL;
