<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:35
 */

namespace Src\http\Controller;


use etc\http\Controller\Controller;
use Src\Repositories\HomeRepositories;

class HomeController extends Controller
{
    /**
     * @return mixed
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getIndex()
    {
        /** @var HomeRepositories $repo */
        $repo = $this->container->get('homeRepo');

        return $repo->getAll();
    }
}