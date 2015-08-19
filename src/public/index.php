<?php

/**
 * File index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.4
 *
 */

include_once '../EntityManager.php';

$em = new EntityManager('../../data/talking.sqlite');
$user = $em->getUserRepository()->findOneById(1);

echo $user->assembleDisplayName() . PHP_EOL;

$newUser = new \Entity\User();
$newUser->setFirstName('Ute');
$newUser->setLastName('Mustermann');
$newUser->setGender(1);

$em->getUserRepository()->saveUser($newUser);

echo $newUser->assembleDisplayName() . PHP_EOL;
