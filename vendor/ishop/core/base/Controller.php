<?php


namespace ishop\base;

//Базовый контроллер
abstract class Controller
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $data = [];
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
    public $layout;

    public function __construct($route)
    {
        //Переписываем данные роута в свойства класса(для послед. передачи аргуметов в конструктор вида)
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
    }

    //Получаем вид
    public function getView()
    {
        //Создаём новый объект вида с роутом, шаблоном,  мета-тегами
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        //Отрисовываем
        $viewObject->render($this->data);
    }

    //Записывем в свойство-массив, что будем отрисовывать
    public function set($data)
    {
        $this->data = $data;
    }

    //Устанавливаем мета-теги в свойства класса
    public function setMeta($title = '', $desc = '', $keywords ='')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;


    }
}