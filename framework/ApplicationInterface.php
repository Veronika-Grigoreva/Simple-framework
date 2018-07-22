<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework;

/**
 * Interface ApplicationInterface
 * @package Framework
 */
interface ApplicationInterface
{
    /*
     * Constants
     */
    const SERVICES_LIST_FILE_PATH = 'framework' . DIRECTORY_SEPARATOR . 'services.php';
    const CLIENT_SERVICES_LIST_FILE_PATH = 'app' . DIRECTORY_SEPARATOR . 'services.php';

    /**
     * @return void
     */
    public static function run();

    /**
     * @return void
     */
    public static function finish();

    /**
     * @return array
     */
    public static function getServicesList();
}
