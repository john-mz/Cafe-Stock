<?php $cliente = new Cliente($conn); ?>

<!-- Bootstrap CSS CDN -->

<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id Cliente</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Estado</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $k = 0;
        foreach ($cliente->consultar() as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id_cliente'] . '</td>';
            echo '<td>' . $value['cedula'] . '</td>';
            echo '<td>' . $value['nombre'] . '</td>';
            echo '<td>' . $value['apellido'] . '</td>';
            echo '<td>' . $value['fecha'] . '</td>';
            echo '<td>' . $value['celular'] . '</td>';
            echo '<td>' . $value['email'] . '</td>';
            echo '<td>' . $value['inactivar'] . '</td>';
            echo '<td><a href="index.php?vista=cliente&&accion=editar&&id=' . $value['id_cliente'] . '&&id_local='.$k.'" class="btn btn-primary btn-sm">Editar</a></td>';
            if($value['inactivar'] === "SI"){
                echo '<td><a href="index.php?vista=cliente&&accion=inactivar&&id=' . $value['id_cliente'] . '&&inactivar=NO" class="btn btn-danger btn-sm">Inactivar</a></td>';
            }else{
                echo '<td><a href="index.php?vista=cliente&&accion=inactivar&&id=' . $value['id_cliente'] . '&&inactivar=SI" class="btn btn-success btn-sm">Activar</a></td>';
            }
            echo '</tr>';
            $k++;
        }
        ?>
        <tr>
            <td colspan="10">
                <a href="index.php?vista=cliente&&accion=agregar" class="btn btn-success">Agregar</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php 
    if(isset($_GET['accion'])){
        switch ($_GET['accion']) {
            case 'agregar':
                require_once('form/cliente.php');
            break;
            case 'editar':
                require_once('editar/cliente.php');
            break;
            default:
                # code...
                break;
        }
    }
?>