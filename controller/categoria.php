<?php 
if(isset($_POST['enviar']) && isset($_GET['vista']) && $_GET['vista'] == 'categoria'){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $parametros = ['nombre' => $nombre, 'descripcion' => $descripcion];

    $categoria = new Categoria($conn);
    $categoria->agregar($parametros);
    header('Location: index.php?vista=categoria');
}

if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar' && isset($_GET['id']) && isset($_GET['vista']) && $_GET['vista'] == 'categoria'){
    $id = $_GET['id'];

    $categoria = new Categoria($conn);
    $categoria->eliminar($id);
    header('Location: index.php?vista=categoria');
}

if(isset($_POST['editar']) && isset($_GET['vista']) && $_GET['vista'] == 'categoria'){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $parametros = ['nombre' => $nombre, 'descripcion' => $descripcion];

    $categoria = new Categoria($conn);
    $categoria->editar($id, $parametros);
    header('Location: index.php?vista=categoria');
}

