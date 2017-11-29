<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 22:00
 */

namespace etc\error;

class ErrorHandler
{
    /**
     * @param $level
     * @param $message
     * @param $file
     * @param $line
     *
     * @throws \ErrorException
     */
    public static function handler($errno, $errstr, $errfile, $errline)
    {
        if (error_reporting() !== 0) {  // to keep the @ operator working
            throw new \ErrorException($errstr, $errno, 1, $errfile, $errline);
        }
    }
}