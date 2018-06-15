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
                return $re->total;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

}
?>