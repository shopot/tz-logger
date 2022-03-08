<?php

namespace Logger\Handlers;

/**
 * Common syslog fake logger handler.
 */
class FakeHandler extends AbstractHandler
{
    /**
     * @param int $logLevel
     * @param string $message
     * @return void
     */
    public function log(int $logLevel, string $message): void
    {
        // Empty
    }
}