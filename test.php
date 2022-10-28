<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
$test = 'test';
$model = match ($test) {
    /* @lang text */
    '=',
    '!=',
    '<',
    '<=',
    '>',
    '>=',
    'LIKE',
    'NOT LIKE',
    '<>' => $model = 1,
    'test' => $model = 'test'
};
var_dump($model);
