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
        <form method="post" action="./Controle/ControleSala.php?ACAO=cadastrarSala">
            <br>
            Bloco:<input class="form-control" type="text" name="bloco" maxlength="40" placeholder="Digite o bloco da sala" />
            <br>
            <br>Numero:<input class="form-control" type="text" id="numero" name="numero" maxlength="40" placeholder="Digite o número da sala." />
            <br>
            <button class="btn btn-primary" type="submit" value="Registrar">Registrar</button>
            <button class="btn btn-danger" type="reset" value="Limpar">Limpar</button>
    </div>
    </form>
</body>
</html>