<?php 
if(isset($_POST['enviar']) && isset($_GET['vista']) && $_GET['vista'] == 'marca'){
    $nombre = $_POST['nombre'];
    $parametros = ['nombre' => $nombre];

    $marca = new Marca($conn);
    $marca->agregar($parametros);
    header('Location: index.php?vista=marca');
}

if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar' && isset($_GET['id']) && isset($_GET['vista']) && $_GET['vista'] == 'marca'){
    $id = $_GET['id'];

    $marca = new Marca($conn);
    $marca->eliminar($id);
    header('Location: index.php?vista=marca');
}

if(isset($_POST['editar']) && isset($_GET['vista']) && $_GET['vista'] == 'marca'){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $parametros = ['nombre' => $nombre];

    $marca = new Marca($conn);
    $marca->editar($id, $parametros);
    header('Location: index.php?vista=marca');
}