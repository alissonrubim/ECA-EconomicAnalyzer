<?php

require_once "DAO/beneficiariesDAO.php";
require_once "models/beneficiaries.php";

$object = new beneficiariesDAO();

$template->header();
$template->sidebar();
$template->mainpanel();

?>
<h1>Relatórios</h1>


<a href="report_1.php">
•	Relatório PDF com a lista de todos os beneficiários e seus respectivos dados em ordem alfabética;
</a><br>
<a href="">
•	Relatório PDF com a lista de todos os beneficiários e a cidade a qual pertencem, com todos os dados do beneficiário e da cidade, ordenados por cidade e posteriormente por nome do beneficiário;
</a><br><a href="">
    •	Relatório PDF com a lista de os pagamentos, incluindo seus respectivos dados;
</a><br><a href="">•	Relatório PDF com o número de beneficiários por cidade e o valor total pago por cidade, por mês, ordenados por valor total decrescente;
</a><br><a href="">•	Relatório PDF com a soma de vezes que o Beneficiários ganhou auxilio, os meses que foram e os valores de cada mês;
</a><br><a href="">•	Relatório PDF com o valor total dos pagamentos por região em ordem alfabética;
</a><br><a href="">• Relatório PDF com o valor total dos pagamentos por estado em ordem alfabética;</a>