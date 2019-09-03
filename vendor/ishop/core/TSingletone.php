<?php


namespace ishop;

//трейт Одиночка(Синглтон). Паттерн для использования гарантированно только одного экземпляра класса
trait TSingletone
{
    private static $instance;

    public static function instance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}