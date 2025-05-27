
<?php $categoria = new Categoria($conn); ?>

<!-- Bootstrap CSS CDN -->

<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id Categoria</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $j = 0;
        foreach ($categoria->consultar() as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id_categoria'] . '</td>';
            echo '<td>' .  $value['nombre'] . '</td>';
            echo '<td>' . $value['descripcion'] . '</td>'; 
            echo '<td>
                    <a href="index.php?vista=categoria&&accion=eliminar&&id=' . $value['id_categoria'] . '" class="btn btn-danger btn-sm me-2">Eliminar</a>
                    <a href="index.php?vista=categoria&&accion=editar&&id=' . $value['id_categoria'] . '&&id_local='.$j.'" class="btn btn-primary btn-sm">Editar</a>
                  </td>';
            echo '</tr>';
            $j++;
        }
        ?>
        <tr>
            <td colspan="4">
                <a href="index.php?vista=categoria&&accion=agregar" class="btn btn-success">Agregar</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php 
if(isset($_GET['accion'])){
    switch ($_GET['accion']) {
        case 'agregar':
            require_once('form/categoria.php');
        break;
        case 'editar':
            require_once('editar/categoria.php');
        break;
        default:
            # code...
            break;
    }
}
?>