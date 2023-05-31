<?php
require_once 'Conexao.php';
class ClassMateriasDAO
{
    public function cadastrar(ClassMaterias $cadastrarMateria)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO materias (id, nome, descricao) values (null,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarMateria->getNome());
            $stmt->bindValue(2, $cadastrarMateria->getDescricao());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarMateria($id)
    {
        try {
            $materia = new ClassMaterias();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, descricao FROM materias WHERE id =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $materiaAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $materia->setId($materiaAssoc['id']);
            $materia->setNome($materiaAssoc['nome']);
            $materia->setDescricao($materiaAssoc['descricao']);

            return $materia;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarMaterias()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM materias";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $materias;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function alterarMateria(ClassMaterias $alterarMateria)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE materias SET nome=?, descricao=? WHERE id=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarMateria->getNome());
            $stmt->bindValue(2, $alterarMateria->getDescricao());
            $stmt->bindValue(3, $alterarMateria->getId());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirMateria($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM materias WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            // echo $ex->getMessage();
        }
    }
}
