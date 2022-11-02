<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace Gcode\Server\Guser\Exception;

class LogicException extends \Exception
{
    public function __construct(string $exp = '参数异常', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($exp, $code, $previous);
    }
}
