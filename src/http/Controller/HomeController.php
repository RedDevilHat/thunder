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
    public function anyIndex()
    {
        /** @var HomeRepositories $repo */
        $repo = $this->container->get('home_repository');

        return $repo->getAll();
    }

    /**
     * @return array
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getUser()
    {
        /** @var HomeRepositories $repo */
        $repo = $this->container->get('home_repository');
        return $repo->getUser();

    }
}