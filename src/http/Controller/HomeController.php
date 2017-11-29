<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:35
 */

namespace Src\http\Controller;


use etc\http\Controller\Controller;

/**
 * Class HomeController
 *
 * @package Src\http\Controller
 */
class HomeController extends Controller
{
    /**
     * @return string
     */
    public function anyIndex()
    {
        return 'Hello world';
    }
}