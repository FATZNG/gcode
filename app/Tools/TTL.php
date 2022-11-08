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

/**
 * This class provite a time-to-live.
 * You can add random time-to-live,
 * to protect your database.
 */
final class TTL
{
    /**
     * Minute TTL.
     */
    final public const MIN_TTL = 60;

    /**
     * Hour TTL.
     */
    final public const HOUR_TTL = 3600;

    /**
     * Day TTL.
     */
    final public const DAY_TTL = 86400;

    /**
     * Week TTL.
     */
    final public const WEEK_TTL = 604800;

    /**
     * Random TTl.
     */
    public static function RANDOMTTL(): int
    {
        return mt_rand(self::MIN_TTL, self::HOUR_TTL);
    }
}
