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
use Gcode\Server\Guser\Request\WebRegisterRequest;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;

#[Controller]
class userController extends AbstractController
{
    #[Inject]
    protected AuthMenu $authMenu;

    #[Inject]
    protected User $user;

    #[Inject]
    protected UserLogic $userLogic;

    #[PostMapping('/user/register')]
    public function webRegister(WebRegisterRequest $request): string
    {
        $data = $request->validated();
        $resp = $this->userLogic->webRegister($data);
        return self::resp();
    }
}
