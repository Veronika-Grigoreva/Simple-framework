<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

require_once 'vendor/autoload.php';

try {
    $app = \Framework\Application::run();
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    $app = \Framework\Application::finish();
}
