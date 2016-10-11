<?php
ob_start();
include(dirname(__FILE__).'/../recettage/exemple.php');
$content = ob_get_clean();
require_once(dirname(__FILE__).'/../vendor/autoload.php');
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
    $html2pdf->writeHTML($content, true);
    $html2pdf->Output($donnees_projet[0]['name'].'.pdf', 'D');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}