<?php

namespace Organiseyou\NameService;

class ConvertService
{
    public static function saveConvert($string): string
    {
        $string = preg_replace('/[^A-Za-z0-9\-]/', "_", $string);

        return strtoupper($string);
    }

    /**
     * Convert string to for usage in url
     *
     * @param $string
     * @return string
     */
    public static function convertNameToId($string): string
    {
        $string = preg_replace("/_+/","-", $string);
        return strtolower($string);
    }

    /**
     *
     * @param $string
     * @return string
     */
    public static function urlToName($string):string
    {
        $string = preg_replace("/-+/","_", $string);

        return strtoupper($string);
    }
}