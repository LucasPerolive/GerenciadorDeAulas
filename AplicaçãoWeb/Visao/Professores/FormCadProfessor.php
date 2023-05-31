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
    <div class="col-md-4 mb-3">
        <form method="post" action="./Controle/ControleProfessor.php?ACAO=cadastrarProfessor">
            <br>
            Nome:<input class="form-control" type="text" name="nome" maxlength="50" placeholder="Digite o nome do professor" /><br>
            Matrícula:<input class="form-control" type="text" name="matricula" maxlength="8" placeholder="Digite a matrícula do professor" /><br>
            CPF:<input class="form-control" type="text" name="CPF" maxlength="14" placeholder="Digite o CPF do professor" /><br>
            Formação:<input class="form-control" type="text" name="formacao" maxlength="50" placeholder="Digite a formação do professor" /><br>
            E-Mail:<input class="form-control" type="text" name="email" maxlength="50" placeholder="Digite o e-mail do professor" /><br>
            <br>
            <button class="btn btn-primary" type="submit" value="Registrar">Registrar</button>
            <button class="btn btn-danger" type="reset" value="Limpar">Limpar campos    </button>
    </div>
    </form>
</body>
</html>