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

class DateHelper
{
    public function dateFormat(string $format, int $time = 0): string
    {
        if (empty($time)) {
            $time = time();
        }
        return date('Y-m-d H:m:s', $time);
    }
}
