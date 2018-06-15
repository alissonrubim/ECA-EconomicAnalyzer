<?php

require_once "conexao.php";
require_once "models/source.php";

class sourceDAO {

    public function remover($source) {
        global $pdo;
        try {
            $statement = $pdo->prepare("DELETE FROM tb_source WHERE id_source = :id");
            $statement->bindValue(":id", $source->getIdSource());
            if ($statement->execute()) {
                return "Registo foi excluído com êxito";
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function salvar($source) {
        global $pdo;
        try {
            if ($source->getIdSource() != "") {
                $statement = $pdo->prepare("UPDATE tb_source SET str_goal=:goal, str_origin=:origin, str_periodicity=:periodicity WHERE id_source = :id;");
                $statement->bindValue(":id", $source->getIdSource());
            } else {
                $statement = $pdo->prepare("INSERT INTO tb_source (str_goal, str_origin, str_periodicity) VALUES (:goal, :origin, :periodicity)");
            }
            $statement->bindValue(":goal", $source->getStrGoal());
            $statement->bindValue(":origin", $source->getStrOrigin());
            $statement->bindValue(":periodicity", $source->getStrPeriodicity());
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

    public function atualizar($source) {
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT id_source, str_goal, str_origin, str_periodicity FROM tb_source WHERE id_source = :id");
            $statement->bindValue(":id", $source->getIdSource());
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                $source->setIdSource($rs->id_source);
                $source->setStrGoal($rs->str_goal);
                $source->setStrOrigin($rs->str_origin);
                $source->setStrPeriodicity($rs->str_periodicity);
                return $source;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function tabelapaginada() {

        global $pdo;
        $endereco = $_SERVER ['PHP_SELF'];

        define('QTDE_REGISTROS', 10);
        define('RANGE_PAGINAS', 2);

        $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

        $linha_inicial = ($pagina_atual - 1) * QTDE_REGISTROS;

        $sql = "SELECT id_source, str_goal, str_origin, str_periodicity FROM tb_source LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_OBJ);

        $sqlContador = "SELECT COUNT(*) AS total_registros FROM tb_source";
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
        <th>ID </th>
        <th>Objetivo</th>  
        <th>Origem</th>
        <th>Periodicidade</th> 
        <th colspan='2'>Ações</th>
        </tr>
        </thead>
        <tbody>";
            foreach ($dados as $var):
                echo "<tr>            
        <td>$var->id_source</td>
        <td>$var->str_goal</td>
        <td>$var->str_origen</td>
        <td>$var->str_periodicity</td>
        <td><a href='?p=city&act=upd&id=$var->id_source'><i class='ti-reload'></i></a></td>
        <td><a href='?p=city&act=del&id=$var->id_source'><i class='ti-close'></i></a></td>
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
