<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Application\Controller\HelloWorld;

use Framework\Controller\AbstractController;

/**
 * Test controller
 *
 * Class Test
 * @package Application\Controller
 */
class Test extends AbstractController
{
    public function run()
    {
        echo 'First Controller! Method run!';
    }

    public function helloWorld()
    {
        echo 'First Controller! Method hello world!';
    }
}
