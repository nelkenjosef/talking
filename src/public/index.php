<?php

/**
 * File /src/public/index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.7
 *
 */

include_once __DIR__ . '/../EntityManager.php';

$dbParams = include __DIR__ . '/../../config/db.config.php';

$em = new EntityManager($dbParams['path']);
$user = $em->getUserRepository()->findOneById(1);

echo $user->assembleDisplayName() . PHP_EOL;

foreach ($user->getPosts() as $post)
{
    echo '  ' . $post->getId() . ' - ' . $post->getTitle() . PHP_EOL;
}
