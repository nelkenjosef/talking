<?php

/**
 * File index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.5
 *
 */

include_once '../EntityManager.php';

$em = new EntityManager('../../data/talking.sqlite');
$user = $em->getUserRepository()->findOneById(1);

echo $user->assembleDisplayName() . PHP_EOL;

$user->setFirstName('Moritz');
$em->getUserRepository()->saveUser($user);

echo $user->assembleDisplayName() . PHP_EOL;
