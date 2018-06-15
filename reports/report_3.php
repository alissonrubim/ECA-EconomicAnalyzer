<?php
require_once "../DAO/conexao.php";
require_once "../DAO/beneficiariesDAO.php";
require_once "../models/beneficiaries.php";
require_once "../assets/php/vendor/autoload.php";
require_once "../assets/php/mpdf/mpdf.php";

ob_start();

$html = ob_get_contents();

$html = "<h1>Beneficiários</h1>
<table class='table table-striped table-bordered'>
    <thead>
        <tr class='active'>
            <th>ID</th>
            <th>NIS</th>
            <th>NOME</th>        
        </tr>
    </thead>
    <tbody>";

$dao = new beneficiariesDAO();
foreach ($dao->getRelatorio01() as $key => $var) {
    $html .=  "<tr>
                <td>".$var->id_beneficiaries."</td>
                <td>".$var->str_nis."</td>
                <td>".$var->str_name_person."</td>        
        </tr>";
}

$html .= "</tbody></table>";

$mpdf = new mPDF();
$mpdf->SetCreator(PDF_CREATOR);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>