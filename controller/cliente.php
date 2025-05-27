<?php 
if (isset($_POST['enviarCliente'])  && isset($_GET['vista']) && $_GET['vista'] == 'cliente'){
    //cedula, nombre, apellido, fecha, celular
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $estado = $_POST['inactivar'];
    $parametros = ['cedula' => $cedula, 'nombre' => $nombre, 'apellido' => $apellido, 'fecha' => $fecha, 'celular' => $celular, 'email' => $email, 'inactivar' => $estado];

    $cliente = new Cliente($conn);
    $cliente->agregar($parametros);
    header('Location: index.php?vista=cliente');
}

if(isset($_GET['inactivar']) && isset($_GET['id']) && isset($_GET['vista']) && $_GET['vista'] == 'cliente'){
    $id = $_GET['id'];
    $estado = $_GET['inactivar'];

    $cliente = new Cliente($conn);
    $cliente->inactivar($id, $estado);
    header('Location: index.php?vista=cliente');
}

if(isset($_POST['editar']) && isset($_GET['vista']) && $_GET['vista'] == 'cliente'){
    $id = $_GET['id'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $estado = $_POST['inactivar'];
    $parametros = ['cedula' => $cedula, 'nombre' => $nombre, 'apellido' => $apellido, 'fecha' => $fecha, 'celular' => $celular, 'email' => $email, 'inactivar' => $estado];

    $cliente = new Cliente($conn);
    $cliente->editar($id, $parametros);
    header('Location: index.php?vista=cliente');
}
