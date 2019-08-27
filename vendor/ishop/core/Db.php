<?php
namespace ishop;

use mysql_xdevapi\Exception;

class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONFIG . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if (!\R::testConnection()) {
            throw new \Exception("Нет соединения с БД", 500);
        } else {
            echo 'DB connected!';
        }
        \R::freeze(true);
        if (DEBUG) {
            \R::debug(true, 1);
        }
    }
}