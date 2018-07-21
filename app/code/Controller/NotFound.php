<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Application\Controller;

use Framework\Controller\AbstractController;

/**
 * Class NotFound
 * @package Application\Controller
 */
class NotFound extends AbstractController
{
    /**
     * Not Found action
     */
    public function notFound()
    {
        exit('404 Not Found');
    }
}
