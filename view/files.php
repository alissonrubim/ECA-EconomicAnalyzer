<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "DAO/filesDAO.php";
require_once "models/files.php";

$object = new filesDAO();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $name = (isset($_POST["name_file"]) && $_POST["name_file"] != null) ? $_POST["name_file"] : "";
    $month = (isset($_POST["month"]) && $_POST["month"] != null) ? $_POST["month"] : "";
    $year = (isset($_POST["year"]) && $_POST["year"] != null) ? $_POST["year"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $name = NULL;
    $month = NULL;
    $year = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $files = new files($id, '', '','');

    $resultado = $object->atualizar($files);
    $name = $resultado->getStrNameFile();
    $month = $resultado->getStrMonth();
    $year = $resultado->getStrYear();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $files = new files($id, '', '','');

    $resultado = $object->atualizar($files);
    $name = $resultado->getStrNameFile();
    $month = $resultado->getStrMonth();
    $year = $resultado->getStrYear();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $files = new files($id, '', '','');
    $msg = $object->remover($files);
    $id = null;
}
?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Ação</h4>
                        <p class='category'>Lista de Arquivos do sistema</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?p=action&act=save&id=" method="POST" name="form1">
                            <hr>
                                <i class="ti-save"></i>
                                <input type="hidden" name="id" value="
<?php
// Preenche o id no campo id com um valor "value"
echo (isset($id) && ($id != null || $id != "")) ? $id : '';
?>"/>
                                Nome do Arquivo:
                                <input type="text" size="10" name="name_file" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($name) && ($name != null || $name != "")) ? $name : '';
?>"/>
                                Mês:
                                <input type="numer" size="50" name="month" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($month) && ($month != null || $month != "")) ? $month : '';
                                ?>"/>
                                
                                Ano:
                                <input type="numer" size="50" name="year" value="<?php                                
                                echo (isset($month) && ($month != null || $month != "")) ? $month : '';
?>"/>
                                <input type="submit" VALUE="Cadastrar"/>
                                <hr>
                                    </form>


<?php
echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';

//chamada a paginação
$object->tabelapaginada();
?>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
