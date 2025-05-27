<?php $marca = new Marca($conn); ?>

<!-- Bootstrap CSS CDN -->

<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id Marca</th>
                <th>Nombre</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $m = 0;
        foreach ($marca->consultar() as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id_marca'] . '</td>';
            echo '<td>' .  $value['nombre'] . '</td>';
            echo '<td><a href="index.php?vista=marca&&accion=eliminar&&id=' . $value['id_marca'] . '" class="btn btn-danger btn-sm me-2">Eliminar</a></td>';
            echo '<td><a href="index.php?vista=marca&&accion=editar&&id=' . $value['id_marca'] . '&&id_local='.$m.'" class="btn btn-primary btn-sm">Editar</a></td>';
            echo '</tr>';
            $m++;
        } 
        ?>
        <tr>
            <td colspan="4">
                <a href="index.php?vista=marca&&accion=agregar" class="btn btn-success">Agregar</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php 
    if(isset($_GET['accion'])){
        switch ($_GET['accion']) {
            case 'agregar':
                require_once('form/marca.php');
            break;
            case 'editar':
                require_once('editar/marca.php');
            break;
            default:
                # code...
                break;
        }
    }
?>