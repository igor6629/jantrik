<?php

namespace jantrik;

trait TSingletone{

    private static $instance;

    // Если в свойстве пусто, тогда поместим в него объект класса и вернем этот объект
    public static function insctance() {
        if (self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    }
}