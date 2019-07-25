<?php

namespace Reporting;

use Reporting\Format\JsonFormatter;
use Reporting\Format\HtmlFormatter;
use Reporting\Format\CsvFormatter;
use Reporting\Format\FormatterInterface;

/**
 * Classe responsable de l'impression des rapports (dynamique et statique)
 */
class ReportPrinter
{
    protected $formatters;
    protected $report;
    protected $allformat = [];

    public function __construct(FormatterInterface $formatters, $report)
    {
        $this->formatters = $formatters;
        $this->report = $report;
    }

    public function print(): void
    {
        echo $this->formatters->format($this->report);
    }

    public function dump(): void
    {
        var_dump($this->formatters->format($this->report));
    }

    public static function printAllFormat($allformat, $report){

    foreach ($allformat as $value) {
        $objectFormat = new $value();
        echo $objectFormat->format($report);
        echo '<br>';
      }
    }
}
