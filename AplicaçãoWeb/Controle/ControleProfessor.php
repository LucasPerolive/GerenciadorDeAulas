<?php
require_once '../Modelo/ClassProfessores.php';
require_once '../Modelo/DAO/ClassProfessoresDAO.php';

$id =@$_POST['idex'];
$nome = @$_POST['nome'];
$matricula = @$_POST['matricula'];
$CPF =@$_POST['CPF'];
$formacao = @$_POST['formacao'];
$email = @$_POST['email'];
$acao = $_GET['ACAO'];


$novoProfessor = new ClassProfessores();
$novoProfessor->setId($id);
$novoProfessor->setNome($nome);
$novoProfessor->setMatricula($matricula);
$novoProfessor->setCPF($CPF);
$novoProfessor->setFormacao($formacao);
$novoProfessor->setEmail($email);

$classProfessoresDAO = new ClassProfessoresDAO();
switch ($acao) {
	case "cadastrarProfessor":
        $professor = $classProfessoresDAO->cadastrar($novoProfessor);
	    if($professor >= 1){
            header('Location:../cadastroprofessor.php?&MSG= Cadastro realizado com sucesso!');
        } else {
            header('Location:../cadastroprofessor.php?&MSG= Não foi possivel realizar o cadastro!');
        }
        break;
	case 'alterarProfessor':
	   //codigo aqui
         
        $professor = $classProfessoresDAO->alterarProfessor($novoProfessor);
        
        if($professor == 1){
            header('Location:../cadastroprofessor.php?&MSG= Cadastro atualizado com sucesso!');
        } else {
            header('Location:../cadastroprofessor.php?&MSG= Não foi possivel realizar a atualização!');
        }
        
        
        
	   break;
    
    case "excluirProfessor":
        if (isset($_GET['idex'])) {
            $id = $_GET['idex'];
            $classProfessorDAO = new ClassProfessoresDAO();
            $us = $classProfessorDAO->excluirProfessores($id);
            if ($us == TRUE) {
                header('Location:../cadastroprofessor.php?PAGINA=listarProfessor&MSG= Professor foi excluido com sucesso!');
            } else {
                header('Location:../cadastroprofessor.php?PAGINA=listarProfessor&MSG=Não foi possivel realizar a exclusão do Professor!');
            }
        }

        break;
    default :
        break;	
 }
?>