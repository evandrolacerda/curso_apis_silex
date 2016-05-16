<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup,
 Doctrine\ORM\EntityManager,
 Doctrine\Common\EventManager as EventManager,
 Doctrine\ORM\Events,
 Doctrine\ORM\Configuration,
 Doctrine\Common\Cache\ArrayCache as ArrayCache,
 Doctrine\Common\Annotations\AnnotationRegistry,
 Doctrine\Common\Annotations\AnnotationReader,
 Doctrine\Common\ClassLoader;


$cache = new ArrayCache();
$annotationReader = new AnnotationReader;

$cachedAnnotationReader = new Doctrine\Common\Annotations\CachedReader( $annotationReader, $cache );
$annotatioDriver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver( $cachedAnnotationReader, array(
    __DIR__ . DIRECTORY_SEPARATOR . 'src'
));
$driverChain = new Doctrine\ORM\Mapping\Driver\DriverChain();
$driverChain->addDriver($annotatioDriver, 'Code');

$config = new Configuration();
$config->setProxyDir('/tmp');
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true);
$config->setMetadataDriverImpl($driverChain);
$config->setMetadataCacheImpl($cache);

AnnotationRegistry::registerFile( __DIR__. DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . 
        DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . 
        DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php'
        ); 

$evm = new EventManager();

$entityManager = EntityManager::create( array(
    'driver' => 'pdo_mysql',
    'host'  => 'localhost',
    'port'  => '3306',
    'user' => 'root',
    'password' => 'epl255',
    'dbname' => 'trilhando_doctrine'
    
), $config, $evm );


$app = new \Silex\Application();
$app['debug'] = true;

$app->register( new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

$app->register( new \Silex\Provider\UrlGeneratorServiceProvider() );
        

