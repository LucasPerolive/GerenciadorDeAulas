<script language="javaScript" type="text/javascript">
function checkDelete(){
    return confirm('Deseja continuar?');
}
</script>

<?php
    require './Modelo/ClassProfessores.php';
    require './Modelo/DAO/ClassProfessoresDAO.php';

    $classProfessoresDAO = new ClassProfessoresDAO();
    $us = $classProfessoresDAO->listarProfessores();

    echo "<table class='table'>";
    echo "  <tr>";
    echo "      <th scope='col'><p align='center'>Nome</p></th> ";
    echo "      <th scope='col'><p align='center'>Matrícula</p></th> ";
    echo "      <th scope='col'><p align='center'>Formação</p></th> ";
    echo "      <th scope='col'><p align='center'>E-mail</p></th> ";
    echo "      <th scope='col'><p align='center'>Exluir</p></th> ";
    echo "      <th scope='col'><p align='center'>Alterar</p></th>";
    echo "  <tr>";

    foreach ($us as $us) {
        echo "<tr>";
        echo "<td scope='col'><p align='center'>" . $us['nome'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['matricula'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['formacao'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['email'] . "</p></td>";
            echo "<td scope='col'><a href='Controle/ControleProfessor.php?ACAO=excluirProfessor&idex=".$us["id"]."' onclick='return checkDelete()'><input type='button' name='excluir' id='excluir' value='excluir' class='btn btn-danger'></a></td>";
            echo "<td scope='col'><a href='Visao/Professores/FormAltProfessor.php?idex=" . $us["id"] . "'><input type='button' value='alterar' class='btn btn-warning'></a></td>";
        echo "</tr>";
    }


