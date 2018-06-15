<?php

class beneficiariesDAO {

    public function count() {
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT COUNT(*) as total FROM tb_beneficiaries");
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                return $rs->total;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function totalPerMonth() {
        global $pdo;
        $estados = array();
        $dados = array();
        try {
            $statement = $pdo->prepare("select DISTINCT s.str_uf, count(*) as total from tb_payments p
join tb_city c
on c.id_city = p.tb_city_id_city
join tb_state s
on s.id_state = c.tb_state_id_state
WHERE p.int_month = 6
group by s.str_uf
order by s.str_uf");
            if ($statement->execute()) {
                $rs = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach ($rs as $var) {
                    array_push($estados, $var->str_uf);
                    array_push($dados, $var->total);
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
        return array($estados, $dados);
    }

    public function remover($beneficiaries) {
        global $pdo;
        try {
            $statement = $pdo->prepare("DELETE FROM beneficiaries WHERE id_beneficiaries = :id");
            $statement->bindValue(":id", $beneficiaries->getIdBeneficiaries());
            if ($statement->execute()) {
                return "Registo foi excluído com êxito";
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function salvar($beneficiaries) {
        global $pdo;
        try {
            if ($beneficiaries->getIdBeneficiaries() != "") {
                $statement = $pdo->prepare("UPDATE tb_beneficiaries SET str_nis=:nis, str_name_person=:name WHERE id_beneficiaries = :id;");
                $statement->bindValue(":id", $beneficiaries->getIdBeneficiaries());
            } else {
                $statement = $pdo->prepare("INSERT INTO tb_beneficiaries (str_nis, str_name_person) VALUES (:nis, :name)");
            }
            $statement->bindValue(":nis", $beneficiaries->getStrNis());
            $statement->bindValue(":name", $beneficiaries->getStrNamePerson());

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

    public function atualizar($beneficiaries) {
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT id_beneficiaries, str_nis, str_name_person FROM tb_beneficiaries WHERE id_beneficiaries = :id");
            $statement->bindValue(":id", $beneficiaries->getIdBeneficiaries());
            if ($statement->execute()) {
                $rs = $statement->fetchAll(PDO::FETCH_OBJ);
                $beneficiaries->setIdBeneficiaries($rs->id_beneficiaries);
                $beneficiaries->setStrNis($rs->str_nis);
                $beneficiaries->setStrNamePerson($rs->str_name_person);
                return $beneficiaries;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function getRelatorio01() {
        global $pdo;
        $beneficiariesLista = array();
        try {
            $statement = $pdo->prepare("SELECT id_beneficiaries, str_nis, str_name_person FROM tb_beneficiaries ORDER BY str_name_person");
            if ($statement->execute()) {
                $rs = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach ($rs as $var) {
                    $a = new beneficiaries($var->id_beneficiaries, $var->str_nis, $var->str_name_person);
                    $a->setIdBeneficiaries($var->id_beneficiaries);
                    $a->setStrNis($var->str_nis);
                    $a->setStrNamePerson($var->str_name_person);
                    array_push($beneficiariesLista, $a);
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
        return $beneficiariesLista;
    }

    public function tabelapaginada() {

        //carrega o banco
        global $pdo;

        //endereço atual da página
        $endereco = $_SERVER ['PHP_SELF'];

        /* Constantes de configuração */
        define('QTDE_REGISTROS', 10);
        define('RANGE_PAGINAS', 2);

        /* Recebe o número da página via parâmetro na URL */
        $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

        /* Calcula a linha inicial da consulta */
        $linha_inicial = ($pagina_atual - 1) * QTDE_REGISTROS;

        /* Instrução de consulta para paginação com MySQL */
        $sql = "SELECT id_beneficiaries, str_nis, str_name_person FROM tb_beneficiaries LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_OBJ);

        /* Conta quantos registos existem na tabela */
        $sqlContador = "SELECT COUNT(*) AS total_registros FROM tb_beneficiaries";
        $statement = $pdo->prepare($sqlContador);
        $statement->execute();
        $valor = $statement->fetch(PDO::FETCH_OBJ);

        /* Idêntifica a primeira página */
        $primeira_pagina = 1;

        /* Cálcula qual será a última página */
        $ultima_pagina = ceil($valor->total_registros / QTDE_REGISTROS);

        /* Cálcula qual será a página anterior em relação a página atual em exibição */
        $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual - 1 : 0;

        /* Cálcula qual será a pŕoxima página em relação a página atual em exibição */
        $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual + 1 : 0;

        /* Cálcula qual será a página inicial do nosso range */
        $range_inicial = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1;

        /* Cálcula qual será a página final do nosso range */
        $range_final = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina;

        /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */
        $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder';

        /* Verifica se vai exibir o botão "Anterior" e "Último" */
        $exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';

        if (!empty($dados)):
            echo "
     <table class='table table-striped table-bordered'>
     <thead>
       <tr class='active'>
        <th>ID</th>
        <th>NIS</th>
        <th>NOME</th>
        <th colspan='2'>Ações</th>
       </tr>
     </thead>
     <tbody>";
            foreach ($dados as $var):
                echo "<tr>
        <td>$var->id_beneficiaries</td>
        <td>$var->str_nis</td>
        <td>$var->str_name_person</td>
        <td><a href='?p=beneficiaries&act=upd&id=$var->id_beneficiaries'><i class='ti-reload'></i></a></td>
        <td><a href='?vact=del&id=$var->id_beneficiaries'><i class='ti-close'></i></a></td>
       </tr>";
            endforeach;
            echo "
</tbody>
     </table>

     <div class='box-paginacao'>
       <a class='box-navegacao  $exibir_botao_inicio' href='$endereco?p=beneficiaries&page=$primeira_pagina' title='Primeira Página'>Primeira</a>
       <a class='box-navegacao $exibir_botao_inicio' href='$endereco?p=beneficiaries&page=$pagina_anterior' title='Página Anterior'>Anterior</a>
";

            /* Loop para montar a páginação central com os números */
            for ($i = $range_inicial; $i <= $range_final; $i++):
                $destaque = ($i == $pagina_atual) ? 'destaque' : '';
                echo "<a class='box-numero $destaque' href='$endereco?p=beneficiaries&page=$i'>$i</a>";
            endfor;

            echo "<a class='box-navegacao $exibir_botao_final' href='$endereco?p=beneficiaries&page=$proxima_pagina' title='Próxima Página'>Próxima</a>
       <a class='box-navegacao $exibir_botao_final' href='$endereco?p=beneficiaries&page=$ultima_pagina' title='Última Página'>Último</a>
     </div>";
        else:
            echo "<p class='bg-danger'>Nenhum registro foi encontrado!</p>
     ";
        endif;
    }

}
