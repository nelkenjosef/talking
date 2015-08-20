<?php

/**
 * File /config/cli-config.php
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 *
 */

require_once __DIR__ . '/../src/bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
