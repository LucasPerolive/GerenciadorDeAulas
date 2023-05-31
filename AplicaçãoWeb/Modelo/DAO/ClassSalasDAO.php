<?php
require_once 'Conexao.php';
class ClassSalasDAO
{
    public function cadastrar(ClassSalas $cadastrarSalas)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO salas (id, bloco, numero) values (null,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarSalas->getBloco());
            $stmt->bindValue(2, $cadastrarSalas->getNumero());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarSalas($id)
    {
        try {
            $sala = new ClassSalas();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, bloco, numero FROM salas WHERE id =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $salaAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $sala->setId($salaAssoc['id']);
            $sala->setBloco($salaAssoc['bloco']);
            $sala->setNumero($salaAssoc['numero']);

            return $sala;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarSalas()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM salas";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $salas;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function alterarSala(ClassSalas $alterarSala)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE sala SET bloco=?, numero=? WHERE id=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarSala->getBloco());
            $stmt->bindValue(2, $alterarSala->getNumero());
            $stmt->bindValue(3, $alterarSala->getId());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirSala($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM salas WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            // echo $ex->getMessage();
        }
    }
}
