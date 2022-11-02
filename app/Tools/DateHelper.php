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
    /**
     * @param string $format default 'Y-m-d H:m:s'
     */
    public function dateFormat(string $format = 'Y-m-d H:m:s', int $time = 0): string
    {
        empty($time) && $time = time();
        return date($format, $time);
    }
}
