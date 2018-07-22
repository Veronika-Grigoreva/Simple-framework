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
     * Data post
     * @var array
     */
    private static $postData;

    /**
     * Uri path
     * @var string
     */
    private static $uriPath;

    /**
     * Is uri admin
     * @var boolean
     */
    private static $isAdminUri;

    /**
     * Run http service
     */
    public static function run()
    {
        self::setHost($_SERVER['SERVER_NAME']);
        self::setUriPath($_SERVER['REQUEST_URI']);
        self::setPostData($_POST);
        $generalConfig = include_once self::GENERAL_CONFIG_PATH;

        if (!$generalConfig['admin_path']) {
            throw new \Exception('Your general config file is corrupted. Please fill admin URL.');
        }
        if (preg_match('/^\/' . $generalConfig['admin_path'] . '\//', self::getUriPath())) {
            self::setIsAdminUri(true);
        } else {
            self::setIsAdminUri(false);
        }
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

    /**
     * @return array
     */
    public static function getPostData()
    {
        return self::$postData;
    }

    /**
     * @param array $postData
     */
    public static function setPostData($postData)
    {
        self::$postData = $postData;
    }

    /**
     * @return bool
     */
    public static function isAdminUri()
    {
        return self::$isAdminUri;
    }

    /**
     * @param bool $isAdminUri
     */
    public static function setIsAdminUri($isAdminUri)
    {
        self::$isAdminUri = $isAdminUri;
    }
}
