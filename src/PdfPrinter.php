<?php

namespace Amohamed\PdfPrinter;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class PdfPrinter
{
    public function printPdf($filePath)
    {
        $printerName = $this->getDefaultPrinter();
        $connector = new WindowsPrintConnector($printerName);
        $printer = new Printer($connector);

        $printer->text(file_get_contents($filePath));
        $printer->cut();
        $printer->close();
    }

    private function getDefaultPrinter()
    {
        $defaultPrinter = shell_exec('wmic printer where default="true" get name');
        $defaultPrinter = explode("\n", $defaultPrinter);
        return trim($defaultPrinter[1]);
    }
}
