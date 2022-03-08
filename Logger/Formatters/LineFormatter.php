<?php


namespace Logger\Formatters;


/**
 * Formats incoming records into a one-line string
 */
class LineFormatter
{
    public const DEFAULT_LINE_FORMAT = '%date%  %level_code%  %level%  %message%';
    public const DEFAULT_DATA_FORMAT = 'Y-m-d H:i:s';
    private string $format;
    private string $dateFormat;

    /**
     * @param string|null $format
     * @param string|null $dateFormat
     */
    public function __construct(?string $format = null, ?string $dateFormat = null)
    {
        $this->format = $format ?? self::DEFAULT_LINE_FORMAT;
        $this->dateFormat = $dateFormat ?? self::DEFAULT_DATA_FORMAT;
    }

    /**
     * @param array $record
     * @return string
     */
    public function format(array $record): string
    {
        $output = $this->format;

        if (!empty($record['message']) && false !== strpos($output, '%message%')) {
            $output = str_replace('%message%', $record['message'], $output);
        }

        if (!empty($record['level']) && false !== strpos($output, '%level%')) {
            $output = str_replace('%level%', $record['level'], $output);
        }

        if (!empty($record['level_code']) && false !== strpos($output, '%level_code%')) {
            $levelCode = sprintf('%03d', $record['level_code']);
            $output = str_replace('%level_code%', $levelCode, $output);
        }

        if (!empty($record['date']) && false !== strpos($output, '%date%')) {
            $output = str_replace('%date%', date($this->dateFormat, $record['date']), $output);
        }

        return $output;
    }
}