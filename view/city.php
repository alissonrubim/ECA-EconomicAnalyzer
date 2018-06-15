<?php


require_once "DAO/cityDAO.php";
require_once "models/city.php";

$object = new cityDAO();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $name = (isset($_POST["name"]) && $_POST["name"] != null) ? $_POST["name"] : "";
    $cod_siafi = (isset($_POST["cod_siafi"]) && $_POST["cod_siafi"] != null) ? $_POST["cod_siafi"] : "";
    $id_state = (isset($_POST["id_state"]) && $_POST["id_state"] != null) ? $_POST["id_state"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";    
    $name = NULL;
    $cod_siafi = NULL;
    $id_state = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $city = new city($id, '', '', '');

    $resultado = $object->atualizar($city);
    $name = $resultado->getStrNameCity();
    $cod_siafi = $resultado->getStrCodSiafiCity();
    $id_state = $resultado->getTbStateIdState();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $city = new city($id, '', '', '');

    $resultado = $object->atualizar($beneficiaries);
    $nis = $resultado->getStrNis();
    $name = $resultado->getStrNamePerson();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $city = new city($id, '', '', '');
    $msg = $object->remover($beneficiaries);
    $id = null;
}

?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Beneficiários</h4>
                        <p class='category'>Lista de Beneficiários do sistema</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?p=city&act=save&id=" method="POST" name="form1">
                            <hr>
                            <i class="ti-save"></i>
                            <input type="hidden" name="id" value="
                            <?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            Nis:
                            <input type="text" size="20" name="nis" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($nis) && ($nis != null || $nis != "")) ? $nis : '';
                            ?>"/>
                            Nome:
                            <input type="numer" size="50" name="name" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($name) && ($name != null || $name != "")) ? $name : '';
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



