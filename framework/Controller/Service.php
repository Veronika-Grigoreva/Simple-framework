<?php
/**
 * Copyright © 2018 Simple Framework. All rights reserved.
 * Author: Veronika Grigoryeva
 */

namespace Framework\Controller;

use Application\Controller\NotFound;
use Framework\ServiceInterface;

/**
 * Class Service
 * @package Framework\Controller
 */
class Service implements ServiceInterface
{
    /**
     * Not Found
     */
    private static function notFound()
    {
        $controller = new NotFound();
        $controller->notFound();
    }

    /**
     * @return array
     * @throws \Exception
     */
    private static function findRoute()
    {
        $uri = trim(\Framework\Http\Service::getUriPath(), '/');
        $routes = include_once self::ROUTES_CONFIG_PATH;

        if (array_key_exists($uri, $routes)) {
            return [
                'route' => $uri,
                'path'  => $routes[$uri],
                'args'  => []
            ];
        }

        $variableRoutes = [];
        foreach ($routes as $route => $path) {
            if (substr_count($route, self::STRING_ROUTE_VARIABLE)
                || substr_count($route, self::NUMBER_ROUTE_VARIABLE)) {
                $strCount = substr_count($route, self::STRING_ROUTE_VARIABLE);
                $strCount += substr_count($route, self::NUMBER_ROUTE_VARIABLE);

                if ($strCount <= self::MAX_ROUTE_VARIABLE) {
                    $variableRoutes[$strCount][$route] = $path;
                }
            }
        }

        for ($variables = 1; $variables <= self::MAX_ROUTE_VARIABLE; $variables ++) {
            if (count($variableRoutes[$variables])) {
                foreach ($variableRoutes[$variables] as $variableRoute => $path) {
                    $pregRoute = str_replace('(:num)', '([0-9]+)', $variableRoute);
                    $pregRoute = str_replace('(:string)', '(\w+)', $pregRoute);
                    $pregRoute = str_replace('/', "\/", $pregRoute);

                    if (preg_match_all('/^' . $pregRoute . '$/i', $uri, $matches, PREG_SET_ORDER)) {
                        unset($matches[0][0]);
                        $args = $matches[0];

                        return [
                            'route' => $variableRoute,
                            'path'  => $path,
                            'args'  => $args
                        ];
                    }
                }
            }
        }

        // TODO: create PageNotFound Exception
        throw new \Exception('Page Not Found');
    }

    /**
     * Run controller
     */
    public static function run()
    {
        try {
            $request = self::findRoute();
            $actionPath = $request['path'];
            $actionArray = explode(':', $actionPath);
            $controllerPath = self::CONTROLLERS_NAMESPACE . $actionArray[0];
            $controller = new $controllerPath();
            $args = $request['args'];

            call_user_func_array(array($controller, $actionArray[1]), $args);
        } catch (\Exception $e) {
            self::notFound();
        } catch (\Error $e) {
            self::notFound();
        }
    }

    /**
     * Empty finish
     */
    public static function finish()
    {
        return;
    }
}
