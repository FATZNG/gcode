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

use Gcode\Server\Guser\Request\WebRegisterRequest;

class UserLogic
{
    public function webRegister(WebRegisterRequest $request): bool
    {
        $data = $request->validated();

        return true;
    }

    public function genRandomName():string
    {
        return '';
    }

    public function genRandomPsw():string
    {
        $i = 0;
        while($i < 16){
            $s = chr(mt_rand(33,126));
            $i++;
        }
        return $s;
    }
}
