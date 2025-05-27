<form action="" method="post" class="mt-4">
    <div class="card shadow-sm" style="max-width: 400px; margin: auto;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Agregar Categoría</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <button type="submit" name="enviar" class="btn btn-success w-100">Guardar</button>
        </div>
    </div>
</form>