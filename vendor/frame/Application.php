<?php
/**
 * File: Application.php
 * Author: frame@it163.org
 * Date: 18/6/24 13:47
 * Link: http://www.it163.org/
 */

namespace vendor\frame;

class Application
{
    public function run($config)
    {

        $router = new \AltoRouter();


        $router->map( 'GET|POST|PATCH|PUT|DELETE', '/[a:controller]/[a:action]', function($controller, $action) {
            $controllerName = '\app\controllers\\' .ucfirst($controller).  'Controller';
            $model = new $controllerName();

            $params = explode('/', $_SERVER['REQUEST_URI']);
            $params = array_slice($params , 3);
            $model->$action(...$params);
        });

        $router->map( 'GET|POST|PATCH|PUT|DELETE', '/[a:controller]/[a:action]/?[**:]', function($controller, $action) {
            $controllerName = '\app\controllers\\' .ucfirst($controller).  'Controller';
            $model = new $controllerName();

            $params = explode('/', $_SERVER['REQUEST_URI']);
            $params = array_slice($params , 3);
            $model->$action(...$params);
        });

        $router->map( 'GET', '/user/[i:id]/', function( $id ) {
            echo $id;
        });

        $match = $router->match();

        if( $match && is_callable( $match['target'] ) ) {
            call_user_func_array( $match['target'], $match['params'] );
        } else {
            // no route was matched
            header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}