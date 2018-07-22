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
     * Destroy flash session
     */
    public static function finish()
    {
        unset($_SESSION['flash']);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getByName($name)
    {
        return $_SESSION[$name];
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public static function setByName($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getFlashByName($name)
    {
        return $_SESSION['flash'][$name];
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public static function setFlashByName($name, $value)
    {
        return $_SESSION['flash'][$name] = $value;
    }
}
