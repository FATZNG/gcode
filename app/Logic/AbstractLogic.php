<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace App\Logic;

abstract class AbstractLogic
{
    public function genRandomPsw(int $len = 16): string
    {
        $i = 0;
        while ($i < $len) {
            $resp = chr(mt_rand(33, 126));
            ++$i;
        }
        return $resp;
    }

    /**
     * get random name of a book
     * or specify a book or opera.
     */
    protected static function getRandomName(string $name, string $type = 'classical'): string
    {
        return '';
    }
}
