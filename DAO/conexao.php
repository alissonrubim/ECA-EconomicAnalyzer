<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=DB_ECA', 'root', 'f45waa58');
    $pdo->exec("set names utf8");
} catch ( PDOException $e ) {
    echo 'Erro ao conectar com o Banco: ' . $e->getMessage();
    exit(1);
}