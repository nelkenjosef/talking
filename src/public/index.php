<?php

/**
 * File index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.3
 *
 */

include_once '../EntityManager.php';

$em = new EntityManager('../../data/talking.sqlite');
$user = $em->getUserRepository()->findByOne(1);

echo $user->assembleDisplayName() . PHP_EOL;
