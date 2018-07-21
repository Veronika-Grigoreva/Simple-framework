<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework\Session;

use Framework\ServiceInterface;

/**
 * Class Service
 * @package Framework\Session
 */
class Service implements ServiceInterface
{
    /**
     * Run session service
     */
    public static function run()
    {
        session_start();
    }

    /**
     * Empty required finish method
     */
    public static function finish()
    {
        return;
    }
}
