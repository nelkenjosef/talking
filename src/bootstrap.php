<?php

/**
 * File /src/bootstrap.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;

$entityPath = __DIR__ . '/entity';
$dbParams = include __DIR__ . '/../config/db.config.php';

$config = Setup::createAnnotationMetadataConfiguration(array($entityPath), $isDevMode);

$em = EntityManager::create($dbParams, $config);
