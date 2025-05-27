<?php
$idForm = $_GET['id'];
$idLocal = $_GET['id_local'];

$cliente = new Cliente($conn);
$clienteConsultar = $cliente->consultar();

?>

<form action="" method="post" class="mt-4">
    <div class="card shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Editar Cliente</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" name="cedula" id="cedula" class="form-control" required value="<?php echo $clienteConsultar[$idLocal]['cedula'] ?>">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required value="<?php echo $clienteConsultar[$idLocal]['nombre'] ?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required value="<?php echo $clienteConsultar[$idLocal]['apellido'] ?>">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required value="<?php echo $clienteConsultar[$idLocal]['fecha'] ?>">
            </div>
            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" id="celular" class="form-control" required value="<?php echo $clienteConsultar[$idLocal]['celular'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required value="<?php echo $clienteConsultar[$idLocal]['email'] ?>">
            </div>
            <button type="submit" name="editar" class="btn btn-primary w-100">Guardar Cambios</button>
        </div>
    </div>
</form>