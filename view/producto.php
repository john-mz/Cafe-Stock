<?php 
$producto = new Producto('', '', '', '', '', $conn);
$no_consumible = new no_consumible('', '',' ', '', '', '', '', '', '', '', $conn);

$no_consumible_consultar = $no_consumible->consultarEspecifico();
?>


<div class="container mt-4">
    <h1 class="mb-4">Tabla general</h1>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Codigo</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Ingredientes</th>
                <th>Envase</th>
                <th>Tipo Cafe</th>
                <th>Cantidad</th>
                <th>Tipo producto</th>
                <th>Codigo Barra</th>
                <th>Fecha vencimiento</th>
                <th>Lote</th>
                <th>Tipo consumible</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($producto->consultar() as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id_producto'] . '</td>';
            echo '<td>' .  $value['nombre'] . '</td>';
            echo '<td>' .  $value['precio'] . '</td>';
            echo '<td>' .  $value['codigo'] . '</td>';
            echo '<td>' .  $value['nombreCategoria'] . '</td>';
            echo '<td>' .  $value['nombreMarca'] . '</td>';
            echo '<td>' . ($value['ingredientes'] == null ? 'No aplica' : $value['ingredientes']) . '</td>';
            echo '<td>' . ($value['envase'] == null ? 'No aplica' : $value['envase']) . '</td>';
            echo '<td>' . ($value['tipo_cafe'] == null ? 'No aplica' : $value['tipo_cafe']) . '</td>';
            echo '<td>' . ($value['cantidad'] == null ? 'No aplica' : $value['cantidad']) . '</td>';
            echo '<td>' . ($value['tipo_producto'] == null ? 'No aplica' : $value['tipo_producto']) . '</td>';
            echo '<td>' . ($value['codigo_barra'] == null ? 'No aplica' : $value['codigo_barra']) . '</td>';
            echo '<td>' . ($value['fecha_vencimiento'] == null ? 'No aplica' : $value['fecha_vencimiento']) . '</td>';
            echo '<td>' . ($value['lote'] == null ? 'No aplica' : $value['lote']) . '</td>';
            echo '<td>' . ($value['tipo_consumible'] == null ? 'No aplica' : $value['tipo_consumible']) . '</td>';
            echo '<td>' . ($value['cant'] == null ? 'No aplica' : $value['cant']) . '</td>';
            echo '</tr>';
        }
        ?>
        <tr>
            <td colspan="16" class="text-center">
                <a href="index.php?vista=producto&&accion=agregar_cafe" class="btn btn-success btn-sm me-2">Agregar Café</a>
                <a href="index.php?vista=producto&&accion=agregar_no_consumible" class="btn btn-warning btn-sm me-2">Agregar No Consumible</a>
                <a href="index.php?vista=producto&&accion=agregar_consumible" class="btn btn-info btn-sm">Agregar Consumible</a>
            </td>
        </tr>
        </tbody>
    </table>

    <h1 class="mb-4 mt-5">Tabla Producto Café</h1>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-danger">
            <tr>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Codigo</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Ingredientes</th>
                <th>Envase</th>
                <th>Tipo Cafe</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $o = 0;
        foreach ($producto->consultar() as $key => $value) {
            if($value['ingredientes'] == null){
                $o++;
            }else{
                echo '<tr>';
                echo '<td>' . $value['id_producto'] . '</td>';
                echo '<td>' .  $value['nombre'] . '</td>';
                echo '<td>' .  $value['precio'] . '</td>';
                echo '<td>' .  $value['codigo'] . '</td>';
                echo '<td>' .  $value['nombreCategoria'] . '</td>';
                echo '<td>' .  $value['nombreMarca'] . '</td>';
                echo '<td>' . ($value['ingredientes'] == null ? 'No aplica' : $value['ingredientes']) . '</td>';
                echo '<td>' . ($value['envase'] == null ? 'No aplica' : $value['envase']) . '</td>';
                echo '<td>' . ($value['tipo_cafe'] == null ? 'No aplica' : $value['tipo_cafe']) . '</td>';
                echo '<td><a href="index.php?vista=producto&&accion=eliminar&&id=' . $value['id_producto']. '" class="btn btn-danger btn-sm me-2">Eliminar</a></td>';
                echo '<td><a href="index.php?vista=producto&&accion=editar_cafe&&id=' . $value['id_producto'] . '&&id_local=' . $o .'" class="btn btn-primary btn-sm">Editar</a></td>';
                echo '</tr>';
                $o++;
            } 
        }
        ?>
        </tbody>
    </table>

    <h1 class="mb-4 mt-5">Tabla No Consumible</h1>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-warning">
            <tr>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Codigo</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Tipo Producto</th>
                <th>Codigo Barra</th>
                <th>Fecha Vencimiento</th>
                <th>Lote</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $o = 0;
        foreach ($producto->consultar() as $key => $value) {
            if($value['cantidad'] == null || $value['tipo_producto'] == null){
                $o++;
            }else{
                echo '<tr>';
                echo '<td>' . $value['id_producto'] . '</td>';
                echo '<td>' .  $value['nombre'] . '</td>';
                echo '<td>' .  $value['precio'] . '</td>';
                echo '<td>' .  $value['codigo'] . '</td>';
                echo '<td>' .  $value['nombreCategoria'] . '</td>';
                echo '<td>' .  $value['nombreMarca'] . '</td>';
                echo '<td>' .  $value['cantidad'] . '</td>';
                echo '<td>' .  $value['tipo_producto'] . '</td>';
                echo '<td>' .  $value['codigo_barra'] . '</td>';
                echo '<td>' .  $value['fecha_vencimiento'] . '</td>';
                echo '<td>' .  $value['lote'] . '</td>';
                echo '<td><a href="index.php?vista=producto&&accion=eliminar&&id=' . $value['id_producto']. '" class="btn btn-danger btn-sm me-2">Eliminar</a></td>';
                echo '<td><a href="index.php?vista=producto&&accion=editar_no_consumible&&id=' . $value['id_producto'] . '&&id_local=' . $o .'" class="btn btn-primary btn-sm">Editar</a></td>';
                echo '</tr>';
                $o++;
            } 
        }
        ?>
        </tbody>
    </table> 

    <h1 class="mb-4 mt-5">Tabla Consumible</h1>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-info">
            <tr>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Codigo</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Tipo Consumible</th>
                <th>cantidad</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $o = 0;
        foreach ($producto->consultar() as $key => $value) {
            if($value['cantidad'] == null || $value['tipo_consumible'] == null){
                $o++;
            }else{
                echo '<tr>';
                echo '<td>' . $value['id_producto'] . '</td>';
                echo '<td>' .  $value['nombre'] . '</td>';
                echo '<td>' .  $value['precio'] . '</td>';
                echo '<td>' .  $value['codigo'] . '</td>';
                echo '<td>' .  $value['nombreCategoria'] . '</td>';
                echo '<td>' .  $value['nombreMarca'] . '</td>';
                echo '<td>' .  $value['tipo_consumible'] . '</td>';
                echo '<td>' .  $value['cantidad'] . '</td>';
                echo '<td><a href="index.php?vista=producto&&accion=eliminar&&id=' . $value['id_producto']. '" class="btn btn-danger btn-sm me-2">Eliminar</a></td>';
                echo '<td><a href="index.php?vista=producto&&accion=editar_consumible&&id=' . $value['id_producto'] . '&&id_local=' . $o .'" class="btn btn-primary btn-sm">Editar</a></td>';
                echo '</tr>';
                $o++;
            }
        }
        ?>
        </tbody>
    </table> 
</div>

<?php 
    if(isset($_GET['accion'])){
        switch ($_GET['accion']) {
            case 'agregar_cafe':
                require_once('form/producto_cafe.php');
            break;
            case 'agregar_no_consumible':
                require_once('form/producto_no_consumible.php');
            break;
            case 'agregar_consumible':
                require_once('form/producto_consumible.php');
            break;
            case 'editar_cafe':
                require_once('editar/producto_cafe.php');
            break;
            case 'editar_no_consumible':
                require_once('editar/producto_no_consumible.php');
            break;
            case 'editar_consumible':
                require_once('editar/producto_consumible.php');
            break;
            default:
                # code...
                break;
        }
    }
?>