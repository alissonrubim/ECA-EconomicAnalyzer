<?php
	require_once "../assets/php/html2pdf/html2fpdf.php";
	$pdf = new HTML2FPDF();
	$pdf->AddPage();
	$pdf->WriteHTML("oi");
	$pdf->Output();

//require_once "../models/beneficiaries.php";
//require_once "../DAO/beneficiariesDAO.php";

/*$dao = new beneficiariesDAO();

$mpdf = new Mpdf();
$html = "<div>Relatório PDF com a lista de todos os beneficiários e seus respectivos dados em ordem alfabética;</div>";

$html = "<table border='1'>";
echo sizeof($dao->getRelatorio01());

foreach($dao->getRelatorio01() as $value){
    $html = $html."<tr><td>".$value->getIdBeneficiaries()."</td><td>".$value->getStrNis()."</td><td>".$value->getStrNamePerson()."</td></tr>";
}

$html .= "</table>";
$mpdf->WriteHTML($html);
$mpdf->Output();*/


?>