<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

require '../../../web/fpdf181/fpdf.php';

include("../../../models/pdf-generator/pdfclass.php");
include("../../../models/excel-generator/headerExcel.php");

require_once "../../../models/pdf-generator/PHPExcel-1.8/Classes/PHPExcel.php";
require_once '../../../models/pdf-generator/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

include '../../../models/connexion.php';
include '../../../models/biens/biens.php';
?>

<?php

$objPHPExcel = new PHPExcel();


$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B4', getHeaderExcel());

$titre_document = "Item_list_" . date('Y-m-d');

$objPHPExcel->getProperties()->setCreator(getHeaderExcel())
        ->setLastModifiedBy(getHeaderExcel())
        ->setTitle($titre_document)
        ->setSubject("Inventory_report")
        ->setDescription("Inventory_report generated by UIGSoft")
        ->setKeywords(getHeaderExcel())
        ->setCategory(getHeaderExcel());

$label_document = "Item list ". date('Y-m-d');

$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B6', $label_document);

$n = 0;

$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B12', 'Id')
        ->setCellValue('C12', 'Category')
        ->setCellValue('D12', 'Name')
        ->setCellValue('E12', 'Perissable')
        ->setCellValue('F12', 'Quantity')
        ->setCellValue('G12', 'Unit price')
        ->setCellValue('H12', 'Status');


$n = 0;

$c = 4;
$r = 12;
$k = 0;

$bdbiens = new BdBiens();
$biens = $bdbiens->getBiensAllDesc();
foreach ($biens as $bien) {
    $n++;
    $v1 = $bien['bId'];
    $v2 = $bien['bDesignation'];
    $v3 = $bien['gDesignation'];
    if ($bien['type_perissable']) {
        $v4 = 'Yes';
    } else {
        $v4 = 'No';
    }
    $v7 = $bien['prixunitaire'];
    $v9 = $bien['quantite'];
    if ($bien['active'] == 1) {

        $v10 = 'Enabled';
    } else {
        $v10 = 'Disabled';
    }
    $v11 = ($bien['prixunitaire'] * $bien['quantite']);
    $r++;

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueByColumnAndRow(1, $r, $v1)
            ->setCellValueByColumnAndRow(2, $r, $v3)
            ->setCellValueByColumnAndRow(3, $r, $v2)
            ->setCellValueByColumnAndRow(4, $r, $v4)
            ->setCellValueByColumnAndRow(5, $r, $v9)
            ->setCellValueByColumnAndRow(6, $r, $v7)
            ->setCellValueByColumnAndRow(7, $r, $v10);
}

$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(1, $r, "Number : " . $n)
        ->setCellValueByColumnAndRow(2, $r, '')
        ->setCellValueByColumnAndRow(3, $r, '')
        ->setCellValueByColumnAndRow(4, $r, '')
        ->setCellValueByColumnAndRow(5, $r, '')
        ->setCellValueByColumnAndRow(6, $r, '')
        ->setCellValueByColumnAndRow(7, $r, '');


$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $titre_document . '".xlsx"');

$objWriter->save('php://output');
exit;
?>