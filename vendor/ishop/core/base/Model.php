<?php
namespace ishop\base;

use ishop\Db;

//Базовая модель
abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }
}