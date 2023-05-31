<script language="javaScript" type="text/javascript">
function checkDelete(){
    return confirm('Deseja continuar?');
}
</script>

<?php
    require './Modelo/ClassMaterias.php';
    require './Modelo/DAO/ClassMateriasDAO.php';

    $classMateriaDAO = new ClassMateriasDAO();
    $us = $classMateriaDAO->listarMaterias();

    echo "<table class='table'>";
    echo "  <tr>";
    echo "      <th scope='col'><p align='center'>Nome</p></th> ";
    echo "      <th scope='col'><p align='center'>Descrição</p></th> ";
    echo "      <th scope='col'><p align='center'>Exluir</p></th> ";
    echo "      <th scope='col'><p align='center'>Alterar</p></th>";
    echo "  <tr>";

    foreach ($us as $us) {
        echo "<tr>";
        echo "<td scope='col'><p align='center'>" . $us['nome'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['descricao'] . "</p></td>";
            echo "<td scope='col'><a href='Controle/ControleMateria.php?ACAO=excluirMateria&idex=".$us["id"]."' onclick='return checkDelete()'><input type='button' name='excluir' id='excluir' value='excluir' class='btn btn-danger'></a></td>";
            echo "<td scope='col'><a href='Visao/Materias/FormAltMateria.php?idex=" . $us["id"] . "'><input type='button' value='alterar' class='btn btn-warning'></a></td>";
        echo "</tr>";
    }


