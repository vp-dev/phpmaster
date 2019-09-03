<?php
namespace app\controllers;

use ishop\App;
use ishop\Cashe;

class MainController extends AppController
{
    public function indexAction()
    {
        //Получаем с помощью CRUD RedBeanPHP данные из таблицы brand
        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        //Передаём в вид (compact возвращает ассоциативный массив с названием=>значением переменной)
        $this->set(compact('brands', 'hits'));
        //Установить мета теги
        $this->setMeta(App::$app->getProperty('shop_name'), "Описание", "Ключевики");
    }

}