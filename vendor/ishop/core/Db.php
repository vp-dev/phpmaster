<?php
namespace ishop;

use mysql_xdevapi\Exception;

class Db
{
    use TSingletone;

    protected function __construct()
    {
        //подключаем массив с инфо о БД
        $db = require_once CONFIG . '/config_db.php';
        //алиас класса, используем \R вместо полного namespace \RedBeanPHP\R
        class_alias('\RedBeanPHP\R', '\R');
        //Подкоючаем RedBeanPHP
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if (!\R::testConnection()) {
            throw new \Exception("Нет соединения с БД", 500);
        } else {
            //echo 'DB connected!';
        }
        //блокируем мод RedBean, который изменяет таблицы БД
        \R::freeze(true);
        if (DEBUG) {
            //Показывает все запросы RedBean, выполняемые к БД
            \R::debug(true, 1);
        }
    }
}