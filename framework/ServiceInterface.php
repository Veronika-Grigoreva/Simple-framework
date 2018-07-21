<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework;

/**
 * Interface ServiceInterface
 * @package Framework
 */
interface ServiceInterface
{
    /*
     * Constants
     */
    const DATABASE_CONFIG_PATH = 'app' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
    const ROUTES_CONFIG_PATH = 'app' . DIRECTORY_SEPARATOR . 'routes.php';
    const CONTROLLERS_NAMESPACE = '\Application\Controller\\';
    const MAX_ROUTE_VARIABLE = 3;
    const NUMBER_ROUTE_VARIABLE = '(:num)';
    const STRING_ROUTE_VARIABLE = '(:string)';

    /**
     * @return void
     */
    public static function run();

    /**
     * @return void
     */
    public static function finish();
}
