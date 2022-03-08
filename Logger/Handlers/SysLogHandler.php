<?php

namespace Logger\Handlers;

use Logger\LogLevel;

/**
 * Common syslog functionality
 */
class SysLogHandler extends AbstractHandler
{
    /**
     * Translates log levels to syslog log priorities.
     * @var array
     */
    protected array $logPriority = [
        LogLevel::LEVEL_ERROR => LOG_ERR,
        LogLevel::LEVEL_INFO => LOG_INFO,
        LogLevel::LEVEL_DEBUG => LOG_DEBUG,
        LogLevel::LEVEL_NOTICE => LOG_NOTICE,

    ];

    /**
     * @param int $logLevel
     * @param string $message
     * @return void
     */
    public function log(int $logLevel, string $message): void
    {
        if ($this->isEnabled) {
            syslog($this->logPriority[$logLevel], $message);
        }
    }
}