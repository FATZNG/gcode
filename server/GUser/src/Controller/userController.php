<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace Gcode\Server\Guser\Controller;

use App\Controller\AbstractController;
use Gcode\Server\Guser\Logic\UserLogic;
use Gcode\Server\Guser\Model\AuthMenu;
use Gcode\Server\Guser\Model\User;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller]
class userController extends AbstractController
{
    #[Inject]
    protected AuthMenu $authMenu;

    #[Inject]
    protected User $user;

    #[Inject]
    protected UserLogic $userLogic;

    #[GetMapping('/user/index')]
    public function index(): array
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    #[GetMapping('/user/get')]
    public function addOrEditUser(): array
    {
        $data = $this->user->get([
        ], ['ORDERBY' => 'id desc', 'PER' => 2, 'PAGE' => 1]);
        var_dump($data);
        exit;
    }

    #[PostMapping('')]

}
