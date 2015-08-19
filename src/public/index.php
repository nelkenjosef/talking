<?php

/**
 * File index.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.6
 *
 */

include_once '../EntityManager.php';

$em = new EntityManager('../../data/talking.sqlite');
$user = $em->getUserRepository()->findOneById(1);

echo $user->assembleDisplayName() . PHP_EOL;

foreach ($user->getPosts() as $post)
{
    echo '  ' . $post->getId() . ' - ' . $post->getTitle() . PHP_EOL;
}
