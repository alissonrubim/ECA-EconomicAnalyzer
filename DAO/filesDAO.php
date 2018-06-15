<?php

require_once "conexao.php";
require_once "models/files.php";

class filesDAO
{
    public function remover($files)
    {
        global $pdo;
        try {
            $statement = $pdo->prepare("DELETE FROM tb_files WHERE id_file = :id");
            $statement->bindValue(":id", $files->getIdFile());
            if ($statement->execute()) {
                return "Registo foi excluído com êxito";
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }
    
    public function salvar($files)
    {
        global $pdo;
        try {
            if ($files->getIdFile() != "") {
                $statement = $pdo->prepare("UPDATE tb_files SET str_name_file=:name_file, str_month=:month, str_year=:year WHERE id_file = :id;");
                $statement->bindValue(":id", $files->getIdFile());
            } else {
                $statement = $pdo->prepare("INSERT INTO tb_files (str_name_file, str_month, str_year) VALUES (:name_file, :month, :year)");
            }
            $statement->bindValue(":name_file", $files->getStrNameFile());
            $statement->bindValue(":month", $files->getStrMonth());
            $statement->bindValue(":year", $files->getStrYear());
            if ($statement->execute()) {
                if ($statement->rowCount() > 0) {
                    return "Dados cadastrados com sucesso!";
                } else {
                    return "Erro ao tentar efetivar cadastro";
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }
    
    public function atualizar($files)
    {
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT id_file, str_name_file, str_month, str_year FROM tb_files WHERE id_file = :id");
            $statement->bindValue(":id", $files->getIdFile());
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                $files->setIdFile($rs->id_file);
                $files->setStrNameFile($rs->str_name_file);
                $files->setStrMonth($rs->str_month);
                $files->setStrYear($rs->str_year);
                return $files;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }
    
    public function tabelapaginada()
    {

        
        global $pdo;        
        $endereco = $_SERVER ['PHP_SELF'];
        
        define('QTDE_REGISTROS', 10);
        define('RANGE_PAGINAS', 2);
        
        $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
        
        $linha_inicial = ($pagina_atual - 1) * QTDE_REGISTROS;
        
        $sql = "SELECT id_file, str_name_file, str_month, str_year FROM tb_files LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_OBJ);
        
        $sqlContador = "SELECT COUNT(*) AS total_registros FROM tb_files";
        $statement = $pdo->prepare($sqlContador);
        $statement->execute();
        $valor = $statement->fetch(PDO::FETCH_OBJ);
        
        $primeira_pagina = 1;
        $ultima_pagina = ceil($valor->total_registros / QTDE_REGISTROS);        
        $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual - 1 : 0;        
        $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual + 1 : 0;        
        $range_inicial = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1;        
        $range_final = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina;        
        $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder';        
        $exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';

        if (!empty($dados)):
            echo " 
        <table class='table table-striped table-bordered'>
        <thead>
        <tr class='active'>
        <th>ID</th>
        <th>Nome Arquivo</th>  
        <th>Mês</th>
        <th>Ano</th>
        <th colspan='2'>Ações</th>
        </tr>
        </thead>
        <tbody>";
            foreach ($dados as $var):
        echo "<tr>            
        <td>$var->id_file</td>
        <td>$var->str_name_file</td>
        <td>$var->str_month</td>
        <td>$var->str_year</td>
        <td><a href='?p=city&act=upd&id=$var->id_file'><i class='ti-reload'></i></a></td>
        <td><a href='?p=city&act=del&id=$var->id_file'><i class='ti-close'></i></a></td>
        </tr>";
            endforeach;
            echo "
        </tbody>
        </table>

        <div class='box-paginacao'>
       <a class='box-navegacao  $exibir_botao_inicio' href='$endereco?p=city&page=$primeira_pagina' title='Primeira Página'>Primeira</a>
       <a class='box-navegacao $exibir_botao_inicio' href='$endereco?p=city&page=$pagina_anterior' title='Página Anterior'>Anterior</a>
";

            
            for ($i = $range_inicial; $i <= $range_final; $i++):
                $destaque = ($i == $pagina_atual) ? 'destaque' : '';
                echo "<a class='box-numero $destaque' href='$endereco?p=city&page=$i'>$i</a>";
            endfor;

            echo "<a class='box-navegacao $exibir_botao_final' href='$endereco?p=city&page=$proxima_pagina' title='Próxima Página'>Próxima</a>
       <a class='box-navegacao $exibir_botao_final' href='$endereco?p=city&page=$ultima_pagina' title='Última Página'>Último</a>
     </div>";
        else:
            echo "<p class='bg-danger'>Nenhum registro foi encontrado!</p>
     ";
        endif;

    }
}

