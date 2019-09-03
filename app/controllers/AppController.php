<?php
namespace app\controllers;

use app\models\AppModel;
use ishop\base\Controller;

class AppController extends Controller
{

    public function __construct($route)
    {
        //вызываем родительский котроллер, т.к. PHP сам не делает это
        parent::__construct($route);
        //создаём модель
        new AppModel();
    }
}