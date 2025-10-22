<?php

namespace Organiseyou\NameService;

class Convert
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

    /**
     * Converts a string to Pascal notation.
     *
     * @param string $string The input string to convert.
     * @return string The PamelCase string.
     */
    public static function toPascalCase(string $string): string
    {
        // Replace underscores, hyphens, and spaces with a space for word separation
        $string = preg_replace('/[_\-\s]+/', ' ', $string);

        // Split into words, capitalize each, then implode
        $words = explode(' ', trim($string));
        $pascalCase = '';
        foreach ($words as $word) {
            if (!empty($word)) {
                $pascalCase .= ucfirst(strtolower($word));
            }
        }
        return $pascalCase;
    }

    /**
     * Convert a string to camalCase
     *
     * @param string $string
     * @return string
     */
    public static function toCamelCase(string $string): string
    {
        return lcfirst(self::toPascalCase($string));
    }
}
