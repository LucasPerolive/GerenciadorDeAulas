<?php
require_once 'Conexao.php';
class ClassProfessoresDAO
{
    public function cadastrar(ClassProfessores $cadastrarProfessor)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO professores (id, nome, matricula, CPF, formacao, email) values (null,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarProfessor->getNome());
            $stmt->bindValue(2, $cadastrarProfessor->getMatricula());
            $stmt->bindValue(3, $cadastrarProfessor->getCPF());
            $stmt->bindValue(4, $cadastrarProfessor->getFormacao());
            $stmt->bindValue(5, $cadastrarProfessor->getEmail());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarProfessor($id)
    {
        try {
            $professor = new ClassProfessores();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, matricula, CPF, formacao, email FROM professores WHERE id =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $professorAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $professor->setId($professorAssoc['id']);
            $professor->setNome($professorAssoc['nome']);
            $professor->setMatricula($professorAssoc['matricula']);
            $professor->setCPF($professorAssoc['CPF']);
            $professor->setFormacao($professorAssoc['formacao']);
            $professor->setEmail($professorAssoc['email']);

            return $professor;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarProfessores()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM professores";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $professores;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function alterarProfessor(ClassProfessores $alterarProfessor)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE professores SET nome=?, matricula=?, CPF=?, formacao=?, email=? WHERE id=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarProfessor->getNome());
            $stmt->bindValue(2, $alterarProfessor->getMatricula());
            $stmt->bindValue(3, $alterarProfessor->getCPF());
            $stmt->bindValue(4, $alterarProfessor->getFormacao());
            $stmt->bindValue(5, $alterarProfessor->getEmail());
            $stmt->bindValue(6, $alterarProfessor->getId());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirProfessores($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM professores WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
