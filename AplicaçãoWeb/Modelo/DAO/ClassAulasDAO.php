<?php
require_once 'Conexao.php';
class ClassAulasDAO
{
    public function cadastrar(ClassAulas $cadastrarAula)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO aulas (id, id_professor, id_materia, id_sala, hora_comeco, hora_fim, data) values (null,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarAula->getIdProfessor());
            $stmt->bindValue(2, $cadastrarAula->getIdMateria());
            $stmt->bindValue(3, $cadastrarAula->getIdSala());
            $stmt->bindValue(4, $cadastrarAula->getHoraComeco());
            $stmt->bindValue(5, $cadastrarAula->getHoraFim());
            $stmt->bindValue(6, $cadastrarAula->getData());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function buscarAula($id)
    {
        try {
            $aula = new ClassAulas();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, id_professor, id_materia, id_sala, hora_comeco, hora_fim, data FROM aulas WHERE id =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $aulaAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $aula->setId($aulaAssoc['id']);
            $aula->setIdProfessor($aulaAssoc['id_professor']);
            $aula->setIdMateria($aulaAssoc['id_materia']);
            $aula->setIdSala($aulaAssoc['id_sala']);
            $aula->setHoraComeco($aulaAssoc['hora_comeco']);
            $aula->setHoraFim($aulaAssoc['hora_fim']);
            $aula->setData($aulaAssoc['data']);

            return $aula;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarAulas()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT a.id AS id, m.nome AS materia, a.data AS data, a.hora_comeco AS comeco, a.hora_fim AS fim, CONCAT(s.bloco, s.numero) AS sala, p.nome AS professor
            FROM (((aulas a INNER JOIN materias m ON a.id_materia = m.id) INNER JOIN salas s ON a.id_sala = s.id) INNER JOIN professores p ON a.id_professor = p.id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $aulas;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function alterarAulas(ClassAulas $alterarAulas)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE aulas SET id_professor=?, id_materia=?, id_sala=?, hora_comeco=?, hora_fim=?, data=? WHERE id=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarAulas->getIdProfessor());
            $stmt->bindValue(2, $alterarAulas->getIdMateria());
            $stmt->bindValue(3, $alterarAulas->getIdSala());
            $stmt->bindValue(4, $alterarAulas->getHoraComeco());
            $stmt->bindValue(5, $alterarAulas->getHoraFim());
            $stmt->bindValue(6, $alterarAulas->getData());
            $stmt->bindValue(7, $alterarAulas->getId());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirAula($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM aulas WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            // echo $ex->getMessage();
        }
    }
}
