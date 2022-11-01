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
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller]
class userController extends AbstractController
{
    #[GetMapping('/usr/index')]
    public function index(): array
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function addOrEditUser(): array
    {
        return [];
    }
}
