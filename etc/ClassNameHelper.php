<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 29.11.2017
 * Time: 22:28
 */

namespace etc;


use etc\data\Repositories\Exception\EntityNotFoundException;

class ClassNameHelper
{
    public static function getEntityClassNameWithoutNameSpace(string $classname): string
    {
        return substr($classname, 11);
    }

    /**
     * @param string $classname
     * @return string
     * @throws EntityNotFoundException
     */
    public static function createTableNameFromRepositoriesName(string $classname): string
    {
        $ccWord = substr($classname, 17);
        $re
            = '/(?#! splitCamelCase Rev:20140412)
            # Split camelCase "words". Two global alternatives. Either g1of2:
      (?<=[a-z])      # Position is after a lowercase,
      (?=[A-Z])       # and before an uppercase letter.
    | (?<=[A-Z])      # Or g2of2; Position is after uppercase,
      (?=[A-Z][a-z])  # and before upper-then-lower case.
    /x';
        $a = preg_split($re, $ccWord);

        if ($a) {
            return $a[0];
        }

        throw new EntityNotFoundException();
    }
}