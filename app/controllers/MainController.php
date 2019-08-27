<?php
namespace app\controllers;

use ishop\App;
use ishop\Cashe;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = \R::findAll('test');

        $this->setMeta(App::$app->getProperty('shop_name'), "Описание", "Ключевики");

        $names =['Andrey', 'Vasya'];
        $cache = Cashe::instance();

        //$cache->set('test', $names);
        $data = $cache->get('test');
        if (!$data) {
            $cache->set('test', $names);
        }

        $name = 'John';
        $age = 30;
        $this->set(compact('name', 'age', 'names', 'posts'));
    }

}