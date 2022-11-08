<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace Gcode\Server\Guser\Logic;

class UserLogic
{
    public function webRegister(array $data): bool
    {
        return true;
    }

    public function genRandomName(): string
    {
        return '';
    }
}
