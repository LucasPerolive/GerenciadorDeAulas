<script language="javaScript" type="text/javascript">
function checkDelete(){
    return confirm('Deseja continuar?');
}
</script>

<?php
    require './Modelo/ClassSalas.php';
    require './Modelo/DAO/ClassSalasDAO.php';

    $classSalasDAO = new ClassSalasDAO();
    $us = $classSalasDAO->listarSalas();

    echo "<table class='table'>";
    echo "  <tr>";
    echo "      <th scope='col'><p align='center'>Bloco</p></th> ";
    echo "      <th scope='col'><p align='center'>Numero</p></th> ";
    echo "      <th scope='col'><p align='center'>Excluir</p></th> ";
    echo "      <th scope='col'><p align='center'>Alterar</p></th>";
    echo "  <tr>";

    foreach ($us as $us) {
        echo "<tr>";
        echo "<td scope='col'><p align='center'>" . $us['bloco'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['numero'] . "</p></td>";
            echo "<td scope='col'><a href='Controle/ControleSala.php?ACAO=excluirSala&idex=".$us["id"]."' onclick='return checkDelete()'><input type='button' name='excluir' id='excluir' value='excluir' class='btn btn-danger'></a></td>";
            echo "<td scope='col'><a href='Visao/Salas/FormAltSala.php?idex=" . $us["id"] . "'><input type='button' value='alterar' class='btn btn-warning'></a></td>";
        echo "</tr>";
    }


