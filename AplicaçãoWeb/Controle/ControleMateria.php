<?php
require_once '../Modelo/ClassMaterias.php';
require_once '../Modelo/DAO/ClassMateriasDAO.php';

$id =@$_POST['idex'];
$nome = @$_POST['nome'];
$descricao = @$_POST['descricao'];
$acao = $_GET['ACAO'];


$novaMateria = new ClassMaterias();
$novaMateria->setId($id);
$novaMateria->setNome($nome);
$novaMateria->setDescricao($descricao);

$classMateriasDAO = new ClassMateriasDAO();
switch ($acao) {
	case "cadastrarMateria":
        $materia = $classMateriasDAO->cadastrar($novaMateria);
	    if($materia >= 1){
            header('Location:../cadastromateria.php?&MSG= Cadastro realizado com sucesso!');
        } else {
            header('Location:../cadastromateria.php?&MSG= Não foi possivel realizar o cadastro!');
        }
        break;

	case 'alterarMateria':
	   //codigo aqui
         
        $materia = $classMateriasDAO->alterarMateria($novaMateria);
        
        if($materia == 1){
            header('Location:../cadastromateria.php?&MSG= Cadastro atualizado com sucesso!');
        } else {
            header('Location:../cadastromateria.php?&MSG= Não foi possivel realizar a atualização!');
        }
        
        
        
	   break;
    
    case "excluirMateria":
        if (isset($_GET['idex'])) {
            $id = $_GET['idex'];
            $classMateriasDAO = new ClassMateriasDAO();
            $us = $classMateriasDAO->excluirMateria($id);
            if ($us == TRUE) {
                header('Location:../cadastromateria.php?PAGINA=listarMaterias&MSG= Matéria foi excluido com sucesso!');
            } else {
                header('Location:../cadastromateria.php?PAGINA=listarMaterias&MSG=Não foi possivel realizar a exclusão da Matéria!');
            }
        }

        break;
    default :
        break;	
 }
?>