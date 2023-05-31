<?php
require_once '../Modelo/ClassAulas.php';
require_once '../Modelo/DAO/ClassAulasDAO.php';

$id =@$_POST['idex'];
$id_professor = @$_POST['id_professor'];
$id_materia = @$_POST['id_materia'];
$id_sala =@$_POST['id_sala'];
$hora_comeco = @$_POST['hora_comeco'];
$hora_fim = @$_POST['hora_fim'];
$data = @$_POST['data'];
$acao = $_GET['ACAO'];

$novaAula = new ClassAulas();
$novaAula->setId($id);
$novaAula->setIdProfessor($id_professor);
$novaAula->setIdMateria($id_materia);
$novaAula->setIdSala($id_sala);
$novaAula->setHoraComeco($hora_comeco);
$novaAula->setHoraFim($hora_fim);
$novaAula->setData($data);

$classAulasDAO = new ClassAulasDAO();
switch ($acao) {
	case "cadastrarAula":
        $aula = $classAulasDAO->cadastrar($novaAula);
	    if($aula >= 1){
            header('Location:../cadastroaula.php?&MSG= Cadastro realizado com sucesso!');
        } else {
            header('Location:../cadastroaula.php?&MSG= Não foi possivel realizar o cadastro!');
        }
        break;
	case 'alterarAula':
	   //codigo aqui
         
        $aula = $classAulasDAO->alterarAulas($novaAula);
        
        if($aula == 1){
            header('Location:../cadastroaula.php?&MSG= Cadastro atualizado com sucesso!');
        } else {
            header('Location:../cadastroaula.php?&MSG= Não foi possivel realizar a atualização!');
        }
        
        
        
	   break;
    
    case "excluirAula":
        if (isset($_GET['idex'])) {
            $id = $_GET['idex'];
            $classAulasDAO = new ClassAulasDAO();
            $us = $classAulasDAO->excluirAula($id);
            if ($us == TRUE) {
                header('Location:../cadastroaula.php?PAGINA=listarAulas&MSG= Aula foi excluido com sucesso!');
            } else {
                header('Location:../cadastroaula.php?PAGINA=listarAulas&MSG=Não foi possivel realizar a exclusão do Usurio!');
            }
        }

        break;
    default :
        break;	
 }
?>