<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework\Http;

use Framework\ServiceInterface;

/**
 * Class Service
 * @package Framework\Http
 */
class Service implements ServiceInterface
{
    /**
     * Host name
     * @var string
     */
    private static $host;

    /**
     * Uri path
     * @var string
     */
    private static $uriPath;

    /**
     * Run http service
     */
    public static function run()
    {
        self::setHost($_SERVER['SERVER_NAME']);
        self::setUriPath($_SERVER['REQUEST_URI']);
    }

    /**
     * Empty required finish method
     */
    public static function finish()
    {
        return;
    }

    /**
     * @return string
     */
    public static function getHost()
    {
        return self::$host;
    }

    /**
     * @param string $host
     */
    public static function setHost($host)
    {
        self::$host = $host;
    }

    /**
     * @return string
     */
    public static function getUriPath()
    {
        return self::$uriPath;
    }

    /**
     * @param string $uriPath
     */
    public static function setUriPath($uriPath)
    {
        self::$uriPath = $uriPath;
    }
}
