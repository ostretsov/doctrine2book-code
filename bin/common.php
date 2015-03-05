<?php
/**
 * (c) Artem Ostretsov <artem@ostretsov.ru>
 * Created at 05.03.2015 08:35
 */

use Doctrine\Common\ClassLoader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Yaml\Yaml;

// some general configs
$isDevMode = true;
$parametersFile = file_get_contents(dirname(__DIR__).'/app/config/parameters.yml');
$paths = [dirname(__DIR__).'/src/SecondChapter/Entity'];

// preparation
set_time_limit(0);
require_once dirname(__DIR__).'/vendor/autoload.php';
$parameters = Yaml::parse($parametersFile);

// autoloading
$secondChapter = new ClassLoader('SecondChapter', dirname(__DIR__).'/src');
$secondChapter->register();

// get EntityManager instance
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create([
        'host'      => $parameters['database']['host'],
        'port'      => $parameters['database']['port'],
        'driver'    => $parameters['database']['driver'],
        'dbname'    => $parameters['database']['name'],
        'user'      => $parameters['database']['user'],
        'password'  => $parameters['database']['password']
    ], $config);