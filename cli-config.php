<?php
/**
 * Created by PhpStorm.
 * User: wap60
 * Date: 07/07/15
 * Time: 12:25
 */



require_once "db/doctrine.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

