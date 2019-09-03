<?php
namespace ishop;

//класс кэширования
class Cashe
{
    //используем трейт синглтона
    use TSingletone;

    //установка кэша, по-умолчанию 1 час
    public function set($key, $data, $seconds = 3600)
    {
        if ($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            //пишет в файл в /tmp/cache/, серализованный массив $content
            if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
                return true;
            }
        }
        return false;
    }

    //получение кэша по ключу
    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content;
            }
            //удаляем файл
            unlink($file);
        }
        return false;
    }

    //удаление кэша
    public function delete()
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            //удаляем файл
            unlink($file);
        }
    }
}