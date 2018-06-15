<?php
class paymentsDAO
{
    public function count()
    {
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT count(*) as total FROM tb_payments");
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

    public function totalPerMonth(){
        global $pdo;
        $estados = array();
        $dados = array();
        try {
            $statement = $pdo->prepare("SELECT DISTINCT P.int_month, count(*) as total from tb_payments p group by P.int_month order by P.int_month");
            if ($statement->execute()) {
                $rs = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach ($rs as $var) {
                    array_push($estados,  $var->int_month);
                    array_push($dados,  $var->total);
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
        return array($estados, $dados);
    }

    public function getTotalPerYear(){
        global $pdo;
        $estados = array();
        $dados = array();
        try {
            $statement = $pdo->prepare("SELECT DISTINCT P.int_month, count(P.tb_beneficiaries_id_beneficiaries) as total from tb_payments p WHERE p.int_year = 2018
                         group by P.int_month
                       order by P.int_month");
            if ($statement->execute()) {
                $rs = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach ($rs as $var) {
                    array_push($estados,  $var->int_month);
                    array_push($dados,  $var->total);
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
        return array($estados, $dados);
    }

    public function getLastMonth(){
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT SUM(db_value) as valor FROM DB_ECA.tb_payments WHERE int_month = 6;");
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                return $rs->valor;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function getValuesPerState(){
        global $pdo;
        $estados = array();
        $dados = array();
        try {
            $statement = $pdo->prepare(" select DISTINCT s.str_uf, SUM(db_value) as total from tb_payments p
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

    public function avarageLastMonth(){
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT SUM(db_value)/COUNT(*) as valor FROM DB_ECA.tb_payments WHERE int_month = 6;");
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                return $rs->valor;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }
}
?>