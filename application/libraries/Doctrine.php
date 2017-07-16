<?php
/**
 * SmartCMS.
 *
 * A full featured CMS software to quickly get started with a new PHP project.
 *
 * @author	Manish Jangir <mjangir70@gmail.com>
 * @copyright	Copyright (c) 2016, Manish Jangir (http://manishjangir.com/)
 *
 * @link	http://manishjangir.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

use Doctrine\Common\ClassLoader;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Logging\EchoSQLLogger;

/**
 * Doctrine Class.
 *
 * Provides doctrine ORM integration in codeigniter
 *
 * @category	Library
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Doctrine
{
    /**
     * Doctrine entity manager.
     * 
     * @var object
     */
    public $em = null;

    /**
     * Class constructor.
     * 
     * Configures doctrine entity manager
     */
    public function __construct()
    {
        // load database configuration from CodeIgniter
        require_once APPPATH.'config/database.php';

        // Set up class loading. You could use different autoloaders, provided by your favorite framework,
        // if you want to.
        //require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';

        // We use the Composer Autoloader instead - just set
        // $config['composer_autoload'] = TRUE; in application/config/config.php
        //require_once APPPATH.'vendor/autoload.php';

        //A Doctrine Autoloader is needed to load the models
        $entitiesClassLoader = new ClassLoader('Entity', APPPATH.'models');
        $entitiesClassLoader->register();

        // Set up caches
        $config = new Configuration();
        $cache = new ArrayCache();
        $config->setMetadataCacheImpl($cache);

        $entityPath = array(APPPATH.'models/Entity');

        $config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entityPath, true);
        $config->setMetadataDriverImpl(
            new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
                new Doctrine\Common\Annotations\CachedReader(
                    new Doctrine\Common\Annotations\AnnotationReader(),
                    new Doctrine\Common\Cache\ArrayCache()
                ),
                $entityPath
            )
        );

        $config->setQueryCacheImpl($cache);

        // Proxy configuration
        $config->setProxyDir(APPPATH.'/models/proxies');
        $config->setProxyNamespace('Proxies');

        // Set up logger
        //$logger = new EchoSQLLogger;
        //$config->setSQLLogger($logger);

        $config->setAutoGenerateProxyClasses(true);

        // Database connection information
        $connectionOptions = array(
            'driver' => 'pdo_mysql',
            'user' => $db['default']['username'],
            'password' => $db['default']['password'],
            'host' => $db['default']['hostname'],
            'dbname' => $db['default']['database'],
        );

        // Create EntityManager
        $this->em = EntityManager::create($connectionOptions, $config);

        $conn = $this->em->getConnection();
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }
}
