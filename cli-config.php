<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;


require_once __DIR__ . '/vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
 $entityManager = $entityManagerFactory-> GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);


