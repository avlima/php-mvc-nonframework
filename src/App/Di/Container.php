<?php

namespace App\Di;


class Container {

   //Método de conexão
    private static function getDb()
     {
        $db = new \PDO("mysql:host=localhost;dbname=testesub100", "root", "ab45");
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    //Método para injeção de depenência
    public static function getClass($name, $data = "") {
        $str_class = "\\App\\Models\\" . ucfirst($name);
        if ($data)
            $class = new $str_class(self::getDb(), $data);
        else
            $class = new $str_class(self::getDb());
        return $class;
    }
}
