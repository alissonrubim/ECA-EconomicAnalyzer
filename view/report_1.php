<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 14/06/2018
 * Time: 19:34
 */

include_once "assets/php/mpdf/mpdf.php";
include_once "models/beneficiaries.php";
include_once "DAO/beneficiariesDAO.php";


$dao = new beneficiariesDAO();


$mpdf = new Mpdf();
$html = "<div>Relatório PDF com a lista de todos os beneficiários e seus respectivos dados em ordem alfabética;</div><table border='1'>";
echo sizeof($dao->getRelatorio01());

foreach($dao->getRelatorio01() as $value){
    $html = $html."<tr><td>".$value->getIdBeneficiaries()."</td><td>".$value->getStrNis()."</td><td>".$value->getStrNamePerson()."</td></tr>";
}
$html .= "</table>";
$mpdf->WriteHTML($html);
$mpdf->Output();