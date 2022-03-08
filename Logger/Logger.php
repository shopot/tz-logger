<?php

namespace Logger;

/**
 * It contains a stack of handlers,
 * and uses them for logging.
 */
class Logger implements LoggerInterface
{
    /**
     * The handler stack.
     * @var array
     */
    private array $handlers = [];

    /**
     * Adds a handler on to the stack.
     * @param \Logger\LoggerInterface $handlerObject
     * @return void
     */
    public function addHandler(LoggerInterface $handlerObject): void
    {
        $this->handlers[] = $handlerObject;
    }

    /**
     * @param int $logLevel
     * @param string $message
     * @return void
     */
    public function log(int $logLevel, string $message): void
    {
        foreach ($this->handlers as $handler) {
            if ($handler->hasLevel($logLevel)) {
                $handler->log($logLevel, $message);
            }
        }
    }

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