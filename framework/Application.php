<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework;

/**
 * Class Application
 * @package Framework
 */
final class Application implements ApplicationInterface
{
    /**
     * Services list
     * @var array
     */
    private static $servicesList;

    /**
     * Start application
     */
    public static function run()
    {
        foreach (self::getServicesList() as $service) {
            $service::run();
        }
    }

    /**
     * Finish application
     */
    public static function finish()
    {
        foreach (self::getServicesList() as $service) {
            $service::finish();
        }
    }

    /**
     * Get services list
     * @return array
     */
    public static function getServicesList()
    {
        if (!self::$servicesList) {
            $servicesList = include_once self::SERVICES_LIST_FILE_PATH;
            $clientServicesList = include_once self::CLIENT_SERVICES_LIST_FILE_PATH;
            $mergedServiceList = $servicesList + $clientServicesList;
            ksort($mergedServiceList);
            self::$servicesList = $mergedServiceList;
        }

        return self::$servicesList;
    }
}
