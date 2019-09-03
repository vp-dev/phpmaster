<?php


namespace ishop;

//реализация паттерна Реестр, что-то вроде буфера, доступного из любого места
//в приложении(Реестр и Одиночка совмещены)
class Registry
{
    use TSingletone;

    protected static $properties = [];

    public function setProperty($name, $value)
    {
     self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties()
    {
        return self::$properties;
    }
}