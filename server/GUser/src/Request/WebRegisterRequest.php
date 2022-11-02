<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace Gcode\Server\Guser\Request;

use Hyperf\Validation\Request\FormRequest;

class WebRegisterRequest extends FormRequest
{
    public function Rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
