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

    public function getLastMonth(){
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT SUM(db_value) as valor FROM DB_ECA.tb_payments WHERE int_month = 5;");
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

    public function avarageLastMonth(){
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT SUM(db_value)/COUNT(*) as valor FROM DB_ECA.tb_payments WHERE int_month = 5;");
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