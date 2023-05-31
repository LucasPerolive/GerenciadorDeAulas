<script language="javaScript" type="text/javascript">
function checkDelete(){
    return confirm('Deseja continuar?');
}
</script>

<?php
    require './Modelo/ClassAulas.php';
    require './Modelo/DAO/ClassAulasDAO.php';

    $classAulasDAO = new ClassAulasDAO();
    $us = $classAulasDAO->listarAulas();

    echo "<table class='table'>";
    echo "  <tr>";
    echo "      <th scope='col'><p align='center'>Matéria</p></th> ";
    echo "      <th scope='col'><p align='center'>Data</p></th> ";
    echo "      <th scope='col'><p align='center'>Comoço da Aula</p></th> ";
    echo "      <th scope='col'><p align='center'>Fim da Aula</p></th>";
    echo "      <th scope='col'><p align='center'>Sala</p></th>";
    echo "      <th scope='col'><p align='center'>Professor</p></th>";
    echo "  <tr>";

    foreach ($us as $us) {
        echo "<tr>";
        echo "<td scope='col'><p align='center'>" . $us['materia'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['data'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['comeco'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['fim'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['sala'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $us['professor'] . "</p></td>";
            echo "<td scope='col'><a href='Controle/ControleAulas.php?ACAO=excluirAula&idex=".$us["id"]."' onclick='return checkDelete()'><input type='button' name='excluir' id='excluir' value='excluir' class='btn btn-danger'></a></td>";
            echo "<td scope='col'><a href='Visao/Aulas/FormAltAulas.php?idex=" . $us["id"] . "'><input type='button' value='alterar' class='btn btn-warning'></a></td>";
        echo "</tr>";
    }

