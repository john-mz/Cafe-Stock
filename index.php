<?php 
require_once('model/categoria.php'); 
require_once('model/cliente.php'); 
require_once('model/marca.php'); 
require_once('model/producto.php'); 

require_once('controller/conexion.php'); 
require_once('controller/categoria.php'); 
require_once('controller/cliente.php'); 
require_once('controller/marca.php'); 
require_once('controller/producto.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menú</a>
            <div>
                <a href="index.php?vista=categoria" class="btn btn-outline-light me-2">Categoria</a>
                <a href="index.php?vista=cliente" class="btn btn-outline-light me-2">Cliente</a>
                <a href="index.php?vista=marca" class="btn btn-outline-light me-2">Marca</a>
                <a href="index.php?vista=producto" class="btn btn-outline-light">Producto</a>
            </div>
        </div>
    </nav>
    
    <?php 
    if(isset($_GET['vista'])){
        switch ($_GET['vista']) {
            case 'categoria':
                require_once('view/categoria.php');
            break;
            case 'cliente':
                require_once('view/cliente.php');
            break;
            case 'marca':
                require_once('view/marca.php');
            break;
            case 'producto':
                require_once('view/producto.php');
            break;
            default:
                
            break;
        }
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>