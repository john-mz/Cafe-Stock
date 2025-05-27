<?php
// Cafe
if (isset($_POST['enviar'])  && isset($_GET['vista']) && $_GET['vista'] == 'producto' && $_GET['accion'] == 'agregar_cafe'){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo = $_POST['precio'];
    $categoria = $_POST['categoria']; //fo_categoria
    $marca = $_POST['marca']; //fo_marca
    $ingredientes = $_POST['ingredientes']; 
    $envase = $_POST['envase'];
    $tipo_cafe = $_POST['tipo_cafe'];

    $producto = new Cafe($nombre, $precio, $codigo, $categoria, $marca, $ingredientes, $envase, $tipo_cafe, $conn);
    $producto->agregar();
    header('Location: index.php?vista=producto&&accion=agregar_cafe');
}

if(isset($_POST['enviar'])  && isset($_GET['vista']) && $_GET['vista'] == 'producto' && $_GET['accion'] == 'editar_cafe'){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo = $_POST['precio'];
    $categoria = $_POST['categoria']; //fo_categoria
    $marca = $_POST['marca']; //fo_marca
    $ingredientes = $_POST['ingredientes']; 
    $envase = $_POST['envase'];
    $tipo_cafe = $_POST['tipo_cafe'];

    $parametros = ['nombre' => $nombre, 'precio' => $precio, 'codigo' => $codigo, 'categoria' => $categoria, 'marca' => $marca, 'ingredientes' => $ingredientes, 'envase' => $envase, 'tipo_cafe' => $tipo_cafe];
    $producto = new Cafe('', '', '', '', '', '', '', '', $conn);

    $producto->editar($id, $parametros);
    header('Location: index.php?vista=producto');
}

if(isset($_GET['vista']) && $_GET['vista'] == 'producto' && isset($_GET['accion']) && $_GET['accion'] == 'eliminar'){
    $id = $_GET['id'];
    $producto = new Cafe('', '', '', '', '', '', '', '', $conn);
    $producto->eliminar($id);

    header('Location: index.php?vista=producto');

}

//no consumible
if (isset($_POST['enviar']) && isset($_GET['vista']) && $_GET['vista'] == 'producto' && $_GET['accion'] == 'agregar_no_consumible'){
// ($nombre, $precio, $codigo, $categoria, $marca, $cantidad, $tipo_producto, $codigo_barra, $fecha_vencimiento, $lote,

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria']; //fo_categoria
    $marca = $_POST['marca']; //fo_marca
    $cantidad = $_POST['cantidad'];
    $tipo_producto = $_POST['tipo_producto'];
    $codigo_barra = $_POST['codigo_barra'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $lote = $_POST['lote'];

    $producto = new no_consumible($nombre, $precio, $codigo, $categoria, $marca, $cantidad, $tipo_producto, $codigo_barra, $fecha_vencimiento, $lote, $conn);
    $producto->agregar();
    header('Location: index.php?vista=producto&&accion=agregar_no_consumible');

    // $producto = new Cafe($nombre, $precio, $codigo, $categoria, $marca, $ingredientes, $envase, $tipo_cafe, $conn);
    // $producto->agregar();
    // header('Location: index.php?vista=producto&&accion=agregar_cafe');
}

if (isset($_POST['enviar']) && isset($_GET['vista']) && $_GET['vista'] == 'producto' && $_GET['accion'] == 'editar_no_consumible'){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria']; //fo_categoria
    $marca = $_POST['marca']; //fo_marca
    $cantidad = $_POST['cantidad'];
    $tipo_producto = $_POST['tipo_producto'];
    $codigo_barra = $_POST['codigo_barra'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $lote = $_POST['lote'];
    $parametros = ['nombre' => $nombre, 'precio' => $precio, 'codigo' => $codigo, 'categoria' => $categoria, 'marca' => $marca, 'cantidad' => $cantidad, 'tipo_producto' => $tipo_producto, 'codigo_barra' => $codigo_barra, 'fecha_vencimiento' => $fecha_vencimiento, 'lote' => $lote];
    
    $producto = new no_consumible('', '', '', '', '', '', '', '', '', '', $conn);
    $producto->editar($id, $parametros);
    header('Location: index.php?vista=producto');
}

// consumible
if (isset($_POST['enviar']) && isset($_GET['vista']) && $_GET['vista'] == 'producto' && $_GET['accion'] == 'agregar_consumible'){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria']; //fo_categoria
    $marca = $_POST['marca']; //fo_marca
    $tipo_consumible = $_POST['tipo_consumible'];
    $cantidad = $_POST['cantidad'];

    $producto = new consumible($nombre, $precio, $codigo, $categoria, $marca, $tipo_consumible, $cantidad, $conn);
    $producto->agregar();
    header('Location: index.php?vista=producto&&accion=agregar_consumible');
}

if (isset($_POST['enviar']) && isset($_GET['vista']) && $_GET['vista'] == 'producto' && $_GET['accion'] == 'editar_consumible'){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria']; //fo_categoria
    $marca = $_POST['marca']; //fo_marca
    $tipo_consumible = $_POST['tipo_consumible'];
    $cantidad = $_POST['cantidad'];

    $parametros = ['nombre' => $nombre, 'precio' => $precio, 'codigo' => $codigo, 'categoria' => $categoria, 'marca' => $marca, 'tipo_consumible' => $tipo_consumible, 'cantidad' => $cantidad];
    $producto = new consumible('', '', '', '', '', '', '', $conn);
    $producto->editar($id, $parametros);
    header('Location: index.php?vista=producto');
}