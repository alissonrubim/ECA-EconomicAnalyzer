<?php
require_once "../DAO/conexao.php";
require_once "../models/beneficiaries.php";
require_once "../assets/php/vendor/autoload.php";
require_once "../assets/php/mpdf/mpdf.php";

ob_start();
?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }               
    table tr:nth-child(odd) {
        background-color: #eee;
    }  
    table tr:nth-child(even) {
        background-color: #fff;
    }   
    table thead th {
        background-color: #ccc;
    } 
    table tfoot td {
        background-color: #ccc;
    } 
</style> 
<h1>Beneficiários</h1>
<table class='table table-striped table-bordered'>
    <thead>
        <tr class='active'>
            <th>ID</th>
            <th>NIS</th>
            <th>NOME</th>        
        </tr>
    </thead>
    <tbody>
        <?php
        global $pdo;
        try {
        $statement = $pdo->prepare("SELECT id_beneficiaries, str_nis, str_name_person FROM tb_beneficiaries");
        if ($statement->execute()) {
        $rs = $statement->fetchAll(PDO::FETCH_OBJ);
        foreach ($rs as $var) {
        echo "<tr>
                        <td>$var->id_beneficiaries</td>
                        <td>$var->str_nis</td>
                        <td>$var->str_name_person</td>        
        </tr>";}

        } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
        } catch (PDOException $erro) {
        return "Erro: " . $erro->getMessage();
        }
         ?> 
        </tbody>
</table>
                  
    
<?php
$html = ob_get_contents();
$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
