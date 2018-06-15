<?php
	require_once "DAO/beneficiariesDAO.php";
	require_once "models/beneficiaries.php";

	$object = new beneficiariesDAO();
?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Relatórios</h4>
                        <p class='category'>Lista de todos os relatórios do sistema</p>

                    </div>
                    <div class='content table-responsive'>
						<a href="reports/report_1.php">
						 	•	Relatório PDF com a lista de todos os beneficiários e seus respectivos dados em ordem alfabética;
						</a>
						<br>
						<a href="?p=report_2">
							•	Relatório PDF com a lista de todos os beneficiários e a cidade a qual pertencem, com todos os dados do beneficiário e da cidade, ordenados por cidade e posteriormente por nome do beneficiário;
						</a>
						<br>
						<a href="?p=report_3">
						    •	Relatório PDF com a lista de os pagamentos, incluindo seus respectivos dados;
						</a>
						<br>
						<a href="?p=report_4">
							•	Relatório PDF com o número de beneficiários por cidade e o valor total pago por cidade, por mês, ordenados por valor total decrescente;
						</a>
						<br>
						<a href="?p=report_5">
							•	Relatório PDF com a soma de vezes que o Beneficiários ganhou auxilio, os meses que foram e os valores de cada mês;
						</a>
						<br>
						<a href="?p=report_6">
							•	Relatório PDF com o valor total dos pagamentos por região em ordem alfabética;
						</a>
						<br>
						<a href="?p=report_7">
						• Relatório PDF com o valor total dos pagamentos por estado em ordem alfabética;
						</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

