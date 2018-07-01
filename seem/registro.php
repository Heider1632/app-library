<?php
    include_once('../model/usuario.php');
    $usuario = new Usuario();
?>
    <tbody>
    <?php
    if(isset($buscar)){
    $usuario->buscarLibro();
    echo $usuario;
    while ($usuario = $libro){
        ?>
        <tr>
            <td><?php echo $libro['nombre']; ?></td>
            <td><?php echo $libro['precio']; ?></td>
            <td><?php echo $libro['categoria']; ?></td>
            <td><select name="cantidad"></select><td>
        </tr>
    <?php
        }
    }
    ?>
    </tbody>

