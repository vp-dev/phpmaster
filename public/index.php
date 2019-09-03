<?php
//FRONT CONTROLLER

//файл с константами
require_once dirname(__FILE__) .'/../config/init.php';
//свои функции
require_once LIBS.'/functions.php';
//роуты
require_once CONFIG.'/routes.php';

//запускаем веб-приложение
new \ishop\App();

