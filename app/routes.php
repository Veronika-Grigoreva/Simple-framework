<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

return [
    'frontend' => [
        'test/run' => 'HelloWorld\Test:run',
        'test/hello_world' => 'HelloWorld\Test:helloWorld',
        'news' => 'News\News:allNews',
        'news/id/(:num)' => 'News\News:news',
        'news/id/(:num)/author/(:string)/year/(:num)' => 'News\News:fake'
    ],
    'adminhtml' => [
        'test/run2' => 'Test:run2'
    ]

];
