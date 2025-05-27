<?php
$query = "SELECT * FROM `categoria`";
$all_categories = mysqli_query($conn, $query);

$query2 = "SELECT * FROM `marca`";
$all_marcas = mysqli_query($conn, $query2);

?>

<form action="" method="post" class="mt-4">
    <div class="card shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Agregar Consumible</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select name="categoria" id="categoria" class="form-select" required>
                    <?php while($category = mysqli_fetch_array($all_categories, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $category["id_categoria"] ?>"><?php echo $category["nombre"]; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <select name="marca" id="marca" class="form-select" required>
                    <?php while($marca = mysqli_fetch_array($all_marcas, MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $marca["id_marca"] ?>"><?php echo $marca["nombre"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo_consumible" class="form-label">Tipo Consumible</label>
                <input type="text" name="tipo_consumible" id="tipo_consumible" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <button type="submit" name="enviar" class="btn btn-info w-100 text-white">Guardar</button>
        </div>
    </div>
</form>