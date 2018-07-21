<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework\Db;

use Framework\ServiceInterface;

/**
 * Class Service
 * @package Framework\Db
 */
class Service implements ServiceInterface
{
    /**
     * Database connection
     * @var object
     */
    private static $connection;

    /**
     * Start database connection
     */
    public static function run()
    {
        $config = include_once self::DATABASE_CONFIG_PATH;
        $pdo = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);

        self::setConnection($pdo);
    }

    /**
     * Destroy database connection
     */
    public static function finish()
    {
        self::setConnection(null);
    }

    /**
     * @return object
     */
    public static function getConnection()
    {
        return self::$connection;
    }

    /**
     * @param object $connection
     */
    public static function setConnection($connection)
    {
        self::$connection = $connection;
    }
}
