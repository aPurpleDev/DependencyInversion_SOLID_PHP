<?php

use Reporting\Format\JsonFormatter;
use Reporting\Format\HtmlFormatter;
use Reporting\Format\CsvFormatter;
use Reporting\ReportPrinter;
use Reporting\Report;

spl_autoload_register(function ($className) {
    // Attention, avec ce principe, vos dossiers et noms de fichiers doivent
    // correspondre exactement aux Namespaces et aux noms de classes
    $className = str_replace("\\", "/", $className);
    require_once($className . ".php");
});

/**
 *
 * Test classe de @var ReportPrinter - instancie chacun des types de Rapport
 * et appel une méthode statique qui les affiche tous avec une foreach loop
 */

$reportPrinter = new ReportPrinter(new HTMLFormatter(), new Report("Rapport HTML","25/07/19"));
$reportPrinter->print();
$reportPrinter->dump();
echo '<br>';

$reportPrinter = new ReportPrinter(new JSONFormatter(), new Report("Rapport HTML","25/07/19"));
$reportPrinter->print();
$reportPrinter->dump();
echo '<br>';
echo '<br>';

$reportPrinter = new ReportPrinter(new CSVFormatter(), new Report("Rapport HTML","25/07/19"));
$reportPrinter->print();
$reportPrinter->dump();
$report = new Report();

$allFormat = [];
$allFormat[] = new HtmlFormatter;
$allFormat[] = new JsonFormatter;
$allFormat[] = new CsvFormatter;//

ReportPrinter::printAllFormat($allFormat,$report);

?>
