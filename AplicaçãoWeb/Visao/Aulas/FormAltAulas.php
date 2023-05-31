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
        <h1 class="display-3">Formulário de atualização de Aulas</h1>
    </div>
</div>
        <?php
            require '../../Modelo/ClassAulas.php';
            require '../../Modelo/DAO/ClassAulasDAO.php';
			$id =@$_GET['idex'];
            $novaAula = new ClassAulas();
            $aulaDAO = new ClassAulasDAO();
            $novaAula = $aulaDAO->buscarAula($id);
            require '../../Modelo/DAO/ClassOpcoesAulas.php';
            $classAulasDAO = new ClassOpcoesAulas();
            $op = $classAulasDAO->OpcoesProfessor();
            $om = $classAulasDAO->OpcoesMateria();
            $os = $classAulasDAO->OpcoesSala();

        ?>
        <form method="post" action="../../Controle/ControleAulas.php?ACAO=alterarAula" >
                <input type="hidden" name="idex" value="<?php echo $novaAula->getId(); ?>">
                Professor:<select name="id_professor" class="form-control">
                    <?php
                        echo "<option>Selecionar</option>";
                        foreach($op as $professor){
                            echo "<option value=" . $professor['id'] . "'> " . $professor['nome'] . "</option>";                    
                        }
                    ?>
                </select>
                <br>
                Matéria:<select name="id_materia" class="form-control">
                    <?php
                        echo "<option>Selecionar</option>";
                        foreach($om as $materia){
                            echo "<option value='" . $materia['id'] . "'> " . $materia['nome'] . "</option>";
                        }
                    ?>
                </select>
                <br>
                Sala:<select name='id_sala' class="form-control">
                    <?php
                        echo "<option>Selecionar</option>";
                        foreach($os as $sala){
                            echo "<option value='" . $sala['id'] . "'> " . $sala['bloco'] . $sala['numero'] . "</option>";
                        }
                    ?>
                </select>        
                <br>
                Inicio da Aula:<input class="form-control" type="time" name="hora_comeco" value="<?php echo $novaAula->getHoraComeco(); ?>" /><br>
                Fim da Aula:<input class="form-control" type="time" name="hora_fim" value="<?php echo $novaAula->getHoraFim(); ?>" /><br>                
                Data:<input class="form-control" type="date" name="data" id="data" value="<?php echo $novaAula->getData(); ?>" /><br>
                
                <button class="btn btn-primary" type="submit" value="Alterar">Alterar</button> 
				<button class="btn btn-primary" type="reset" value="Limpar">Limpar</button>
            </div>
        </form>
    </body>
</html>