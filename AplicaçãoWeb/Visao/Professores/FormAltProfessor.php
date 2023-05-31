<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<title>Fromu</title>	
</head>

</style>
<body  class="p-3 mb-2 bg-dark text-white">
<div class="jumbotron">
    <div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                <a href="../../index.php" class="btn btn-info">Home</a>
                </div>
                <div class="col-md-auto">
                <a href="../../cadastroprofessor.php" class="btn btn-info">Cadastrar Professor</a>
                </div>
                <div class="col-md-auto">
                <a href="../../cadastromateria.php" class="btn btn-info">Cadastrar Matéria</a>
                </div>
                <div class="col-md-auto">
                <a href="../../cadastrosala.php" class="btn btn-info">Cadastrar Sala</a>
                </div>
                <div class="col-md-auto">
                <a href="../../cadastroaula.php" class="btn btn-info">Cadastrar Aula</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-dark"   >
        <h1 class="display-3">Formulário de atualização de Professores</h1>
    </div>
</div>
        <?php
            require '../../Modelo/ClassProfessores.php';
            require '../../Modelo/DAO/ClassProfessoresDAO.php';
			$id =@$_GET['idex'];
            $novoProfessor = new ClassProfessores();
            $professorDAO = new ClassProfessoresDAO();
            $novoProfessor = $professorDAO->buscarProfessor($id);

        ?>
        <form method="post" action="../../Controle/ControleProfessor.php?ACAO=alterarProfessor" >
                <input type="hidden" name="idex" value="<?php echo $novoProfessor->getId(); ?>">
                Nome:<input class="form-control" type="text" name="nome" maxlength="50" placeholder="Digite o nome do professor" /><br>
                Matrícula:<input class="form-control" type="text" name="matricula" maxlength="8" placeholder="Digite a matrícula do professor" /><br>
                CPF:<input class="form-control" type="text" name="CPF" maxlength="14" placeholder="Digite o CPF do professor" /><br>
                Formação:<input class="form-control" type="text" name="formacao" maxlength="50" placeholder="Digite a formação do professor" /><br>
                E-Mail:<input class="form-control" type="text" name="email" maxlength="50" placeholder="Digite o e-mail do professor" /><br>
                <br>
				<button class="btn btn-primary" type="submit" value="Alterar">Alterar</button> 
				<button class="btn btn-primary" type="reset" value="Limpar">Limpar</button>
            </div>
        </form>
    </body>
</html>
