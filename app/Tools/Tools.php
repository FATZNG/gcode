<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace App\Tools;

use App\Controller\AbstractController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller]
class Tools extends AbstractController
{
    #[GetMapping('/ss')]
    public function ss(): \Psr\Http\Message\ResponseInterface
    {
        return self::resp(['nihao']);
    }
}
