<?php

namespace Logger;

/**
 * Logging level.
 */
class LogLevel
{
    public const LEVEL_ERROR = 1;
    public const LEVEL_INFO = 2;
    public const LEVEL_DEBUG = 3;
    public const LEVEL_NOTICE = 4;

    /** Gets the name of the logging level.
     * @param int $level
     * @return string
     */
    public static function getLevelName(int $level): string
    {
        static $levels = [
            self::LEVEL_ERROR => 'ERROR',
            self::LEVEL_INFO => 'INFO',
            self::LEVEL_DEBUG => 'DEBUG',
            self::LEVEL_NOTICE => 'NOTICE',
        ];

        return $levels[$level] ?? 'UNKNOWN';
    }
}