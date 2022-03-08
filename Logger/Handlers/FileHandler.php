<?php

namespace Logger\Handlers;

use Logger\LogLevel;

/**
 * Logs to a file
 */
class FileHandler extends AbstractHandler
{
    /**
     * @var false|resource
     */
    private $handle;

    /**
     * @param $args
     */
    public function __construct($args = [])
    {
        parent::__construct($args);

        if (!empty($args['filename'])) {
            $this->handle = fopen($args['filename'], 'ab');
        } else {
            $this->handle = false;
        }
    }

    public function __destruct()
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
        }
    }

    /**
     * @param int $logLevel
     * @param string $message
     * @return void
     */
    public function log(int $logLevel, string $message): void
    {
        if ($this->isEnabled && is_resource($this->handle)) {

            $output = $this->format([
                'date' => time(),
                'level_code' => $logLevel,
                'level' => LogLevel::getLevelName($logLevel),
                'message' => $message
            ]);

            fwrite($this->handle, $output . "\n");
        }
    }
}