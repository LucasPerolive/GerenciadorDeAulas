<?php
require_once 'Conexao.php';
class ClassOpcoesAulas
{

    public function OpcoesSala(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, bloco, numero FROM salas";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $opsalas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $opsalas;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function OpcoesProfessor(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome FROM professores";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $opprofessores = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $opprofessores;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function OpcoesMateria(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome FROM materias";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $opmaterias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $opmaterias;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}