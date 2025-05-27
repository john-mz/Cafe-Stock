<?php
$idForm = $_GET['id'];
$idLocal = $_GET['id_local'];

$categoria = new Categoria($conn);
$categoriaConsultar = $categoria->consultar();

?>

<form action="" method="post" class="mt-4">
    <div class="card shadow-sm" style="max-width: 400px; margin: auto;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Editar Categoría</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required value="<?php echo $categoriaConsultar[$idLocal]['nombre'] ?>">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required value="<?php echo $categoriaConsultar[$idLocal]['descripcion'] ?>">
            </div>
            <button type="submit" name="editar" class="btn btn-primary w-100">Guardar Cambios</button>
        </div>
    </div>
</form>