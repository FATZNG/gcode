<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
if (! function_exists('dd')) {
    function dd(...$val): void
    {
        var_dump($val);
        exit;
    }
}

if (! function_exists('di')) {
    function di($id): mixed
    {
        return \Hyperf\Utils\ApplicationContext::getContainer()->get($id);
    }
}

if (! function_exists('request')) {
    function request()
    {
        return di(\Hyperf\HttpServer\Request::class);
    }
}

if (! function_exists('response')) {
    function response()
    {
        return di(\Hyperf\HttpServer\Response::class);
    }
}
