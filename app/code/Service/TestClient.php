<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Application\Service;

use Framework\ServiceInterface;

/**
 * Class TestClient
 * @package Application\Service
 */
class TestClient implements ServiceInterface
{
    /**
     * Run session service
     */
    public static function run()
    {
        echo 'run client service';
    }

    /**
     * finish
     */
    public static function finish()
    {
        return;
    }
}
