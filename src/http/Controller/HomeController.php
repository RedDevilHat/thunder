<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:35
 */

namespace Src\http\Controller;


use etc\http\Controller\Controller;
use etc\http\Exception\BadRequestException;
use Src\Manager\Exception\UserManagerException;
use Src\Manager\UserManager;

/**
 * Class HomeController
 *
 * @package Src\http\Controller
 */
class HomeController extends Controller
{
    /**
     * @return array
     */
    public function anyIndex()
    {
        return ['thunder' => ['say' => 'Hello world'], 'thunder_ver' => '0.0.1-alpha'];
    }

    /**
     * @return array
     * @throws BadRequestException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Exception
     */
    public function postRegister()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        /** @var UserManager $um */
        $um = $this->container->get('user_manager');

        if($username && $password) {
            try {
                return $um->createUser($username, $password);
            } catch (UserManagerException $exception) {
                throw new BadRequestException();
            }
        }
    }
}