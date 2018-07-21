<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Application\Controller\News;

use Framework\Controller\AbstractController;

/**
 * Class News
 * @package Application\Controller\News
 */
class News  extends AbstractController
{
    public function news($id)
    {
        echo 'Methods news item with id: ' . $id;
    }

    public function allNews()
    {
        echo 'Method all news';
    }
}
