<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <title></title>
</head>
<body>

    <?php
        require './Modelo/DAO/ClassOpcoesAulas.php';
        $classAulasDAO = new ClassOpcoesAulas();
        $op = $classAulasDAO->OpcoesProfessor();
        $om = $classAulasDAO->OpcoesMateria();
        $os = $classAulasDAO->OpcoesSala();
    ?>

    <div class="col-md-4 mb-3">
        <form method="post" action="./Controle/ControleAulas.php?ACAO=cadastrarAula">
            <br>
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
            Inicio da Aula:<input class="form-control" type="time" name="hora_comeco" /><br>
            Fim da Aula:<input class="form-control" type="time" name="hora_fim" /><br>                
            Data:<input class="form-control" type="date" name="data" id="data" /><br>

        
            <button class="btn btn-primary" type="submit" value="Registrar">Registrar</button>
            <button class="btn btn-danger" type="reset" value="Limpar">Limpar</button>
    </div>
    </form>
</body>
</html>