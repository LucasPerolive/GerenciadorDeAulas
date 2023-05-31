<!DOCTYPE html>
<?php
$msg = @$_GET['MSG'];
if ($msg != null || $msg != '') {
    echo "<script>alert('$msg')</script>";
}

echo "</div>";
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<title>Menu</title>	
</head>

</style>
<body  class="p-3 mb-2 bg-dark text-white">
<div class="jumbotron">
    <div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                <a href="./index.php" class="btn btn-info">Home</a>
                </div>
                <div class="col-md-auto">
                <a href="./cadastroprofessor.php" class="btn btn-info">Cadastrar Professor</a>
                </div>
                <div class="col-md-auto">
                <a href="./cadastromateria.php" class="btn btn-info">Cadastrar Matéria</a>
                </div>
                <div class="col-md-auto">
                <a href="./cadastrosala.php" class="btn btn-info">Cadastrar Sala</a>
                </div>
                <div class="col-md-auto">
                <a href="./cadastroaula.php" class="btn btn-info">Cadastrar Aula</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-dark"   >
        <h1 class="display-3">Formulário de cadastro de Matérias</h1>
    </div>
</div>
   
    <?php

    include 'Visao/Materias/FormCadMateria.php';
    include 'Visao/Materias/ListarMateria.php';
    ?>




</body>

</html>