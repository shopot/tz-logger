<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;
use Logger\LoggerInterface;
use Logger\LogLevel;

/**
 *  Base Handler class providing basic functionality support.
 */
abstract class AbstractHandler implements LoggerInterface
{
    /** @var bool */
    protected bool $isEnabled;

    /** @var array */
    protected array $logLevels;

    /** @var LineFormatter|null */
    protected $formatterObject;

    /**
     * @param array $args
     */
    public function __construct(array $args = [])
    {
        $this->isEnabled = $args['is_enabled'] ?? false;
        $this->logLevels = $args['levels'] ?? [LogLevel::LEVEL_ERROR, LogLevel::LEVEL_INFO, LogLevel::LEVEL_DEBUG, LogLevel::LEVEL_NOTICE];
        $this->formatterObject = $args['formatter'] ?? null;
    }

    /**
     * @param bool $isEnabled
     * @return void
     */
    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isEnabled = $isEnabled;
    }

    /**
     * @param int $logLevel
     * @return bool
     */
    public function hasLevel(int $logLevel): bool
    {
        return in_array($logLevel, $this->logLevels, true);
    }

    /**
     * @param array $record
     * @return string
     */
    public function format(array $record): string
    {
        if ($this->formatterObject instanceof LineFormatter) {
            return $this->formatterObject->format($record);
        }

        throw new \LogicException('The formatter object does not implement ' . LineFormatter::class);
    }

    /**
     * @param int $logLevel
     * @param string $message
     * @return void
     */
    abstract public function log(int $logLevel, string $message): void;

    /**
     * @param string $message
     * @return void
     */
    public function info(string $message): void
    {
        $this->log(LogLevel::LEVEL_INFO, $message);
    }

    /**
     * @param string $message
     * @return void
     */
    public function debug(string $message): void
    {
        $this->log(LogLevel::LEVEL_DEBUG, $message);
    }

    /**
     * @param string $message
     * @return void
     */
    public function notice(string $message): void
    {
        $this->log(LogLevel::LEVEL_NOTICE, $message);
    }

    /**
     * @param string $message
     * @return void
     */
    public function error(string $message): void
    {
        $this->log(LogLevel::LEVEL_ERROR, $message);
    }
}