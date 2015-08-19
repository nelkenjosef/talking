<?php

/**
 * File index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.1
 *
 */

include '../entity/User.php';

$db = new \PDO('sqlite:../../data/talking.sqlite');
$userData = $db->query('SELECT * FROM users WHERE id = 1;')->fetch();

$user = new Entity\User();
$user->setId($userData['id']);
$user->setFirstName($userData['first_name']);
$user->setLastName($userData['last_name']);
$user->setGender($userData['gender']);
$user->setNamePrefix($userData['name_prefix']);

echo $user->assembleDisplayName() . PHP_EOL;
