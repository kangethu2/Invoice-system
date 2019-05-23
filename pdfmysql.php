<?php
require_once("DBController.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM owner");
$header = $db_handle->runQuery("SELECT `name` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='blog_samples' 
    AND `TABLE_NAME`='owner'");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(90,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
}
$pdf->Output();
?>