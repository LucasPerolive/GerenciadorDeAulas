<?php
require_once '../Modelo/ClassSalas.php';
require_once '../Modelo/DAO/ClassSalasDAO.php';

$id =@$_POST['idex'];
$bloco = @$_POST['bloco'];
$numero = @$_POST['numero'];
$acao = $_GET['ACAO'];


$novaSala = new ClassSalas();
$novaSala->setId($id);
$novaSala->setBloco($bloco);
$novaSala->setNumero($numero);

$classSalasDAO = new ClassSalasDAO();
switch ($acao) {
	case "cadastrarSala":
        $sala = $classSalasDAO->cadastrar($novaSala);
	    if($sala >= 1){
            header('Location:../cadastrosala.php?&MSG= Cadastro realizado com sucesso!');
        } else {
            header('Location:../cadastrosala.php?&MSG= Não foi possivel realizar o cadastro!');
        }
        break;
	case 'alterarSala':
	   //codigo aqui
         
        $sala = $classSalasDAO->alterarSala($novaSala);
        
        if($sala == 1){
            header('Location:../cadastrosala.php?&MSG= Cadastro atualizado com sucesso!');
        } else {
            header('Location:../cadastrosala.php?&MSG= Não foi possivel realizar a atualização!');
        }
        
        
        
	   break;
    
    case "excluirSala":
        if (isset($_GET['idex'])) {
            $id = $_GET['idex'];
            $classSalasDAO = new ClassSalasDAO();
            $us = $classSalasDAO->excluirSala($id);
            if ($us == TRUE) {
                header('Location:../cadastrosala.php?PAGINA=listarSalas&MSG= Sala foi excluida com sucesso!');
            } else {
                header('Location:../cadastrosala.php?PAGINA=listarSalas&MSG=Não foi possivel realizar a exclusão da Sala!');
            }
        }

        break;
    default :
        break;	
 }
?>