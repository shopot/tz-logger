<?php

namespace Logger;

interface LoggerInterface
{
    /**
     * Adds a log record.
     * @param int $logLevel
     * @param string $message
     * @return void
     */
    public function log(int $logLevel, string $message): void;

    /**
     * Adds a log record at the INFO level.
     * @param string $message
     * @return void
     */
    public function info(string $message): void;

    /**
     * Adds a log record at the DEBUG level.
     * @param string $message
     * @return void
     */
    public function debug(string $message): void;

    /**
     * Adds a log record at the NOTICE level.
     * @param string $message
     * @return void
     */
    public function notice(string $message): void;

    /**
     * Adds a log record at the ERROR level.
     * @param string $message
     * @return void
     */
    public function error(string $message): void;
}