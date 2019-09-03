<?php
namespace ishop;

class Router
{
    protected static $routes = [];
    protected static $route = [];

    //Подлючем новый роут
    public static function add($regexp, $route = [])
    {
        //записываем в массив паттерн и соответствия
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);        //Возвращает строку без возможных параметров
        if (self::matchRoute($url)) {                //Проверяем запрос на соответствие роутам
          $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
          if (class_exists($controller)) {
              $controllerObject = new $controller(self::$route);
              $action = self::lowerCamelCase(self::$route['action']) . 'Action';
              if (method_exists($controllerObject, $action)) {
                  //Запускаем нужный экшн в контроллере
                  $controllerObject->$action();
                  //Подключаем вид
                  $controllerObject->getView();
              } else {
                  throw new \Exception("Метод $action в $controller не найден", 404);
              }
          } else {
              throw new \Exception("Контроллер $controller не найден", 404);
          }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    //Проверяем запрос на соответствие роутам
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action']))  {
                    $route['action'] = 'index';
                }
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    protected static function upperCamelCase($name)
    {
       return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    //Возвращает строку запроса без возможных параметров
    public static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
}