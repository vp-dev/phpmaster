<?php

namespace ishop;

class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '');
        session_start();

        //добавляем в свойство класса - реестр (реализация паттерна, что-то вроде буфера, доступного из любого места
        // в приложении(Реестр и Одиночка совмещены))
        self::$app = Registry::instance();
        //записываем в свойство массив общих параметров сайта
        $this->getParams();
        //класс для обработки ошибок
        new ErrorHandler();
        //метод разбора строки запроса
        Router::dispatch($query);
    }

    //Получаем массив с общими параметрами сайта(название сайта, mail админа и тд)
    protected function getParams()
    {
        $params = require_once CONFIG.'/params.php';
        if(!empty($params)){
            foreach ($params as $k => $v){
                //используем Реестр
                self::$app->setProperty($k, $v);
            }
        }
    }
}