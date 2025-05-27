<?php

    class Producto{
        protected $nombre;
        protected $precio;
        protected $codigo;
        protected $categoria;
        protected $marca;
        protected $conexion;

        public function __construct($nombre, $precio, $codigo, $categoria, $marca, $conexion){
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->codigo = $codigo;
            $this->categoria = $categoria;
            $this->marca = $marca;
            $this->conexion = $conexion;
        }

        public function agregar(){
            $sql = "INSERT INTO producto (nombre, precio, codigo, categoria, marca) VALUES ('$this->nombre', '$this->precio', '$this->codigo', '$this->categoria', '$this->marca')";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto agregado correctamente";
            }else{
                echo "Error al agregar el producto";
            }
        
        }

        public function editar($id, $parametros){
            $sql = "UPDATE producto SET nombre = '$parametros[nombre]', precio = $parametros[precio], 'codigo = $parametros[codigo]', categoria = $parametros[categoria], marca = $parametros[marca] WHERE codigo = '$id";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto editado correctamente";
            }else{
                echo "Error al editar el producto";
            }
        }

        public function inactivar($id){
            $sql = "UPDATE producto SET estado = 0 WHERE codigo = '$this->codigo'";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto inactivado correctamente";
            }else{
                echo "Error al inactivar el producto";
            }
        }

        public function eliminar($id){
            $sql = "DELETE FROM producto WHERE `producto`.`id_producto` = $id";
            mysqli_query($this->conexion, $sql) or die ("Error al eliminados los datos");
            return $mensaje = "Datos eliminados correctamente";
        }


        public function consultar(){
            $sql = 'SELECT producto.id_producto, producto.nombre, producto.precio, producto.codigo, categoria.nombre as nombreCategoria, marca.nombre as nombreMarca, producto.ingredientes, producto.envase, producto.tipo_cafe, producto.cantidad, producto.tipo_producto, producto.codigo_barra, producto.fecha_vencimiento, producto.lote, producto.tipo_consumible, producto.cant
            FROM producto
            INNER JOIN categoria on producto.fo_categoria = categoria.id_categoria
            INNER JOIN marca on producto.fo_marca = marca.id_marca;';
            
            $resultado = mysqli_query($this->conexion, $sql) or die ("Error al consultar los datos");
            $row = [];
            if($resultado->num_rows > 0) {
                $row = $resultado->fetch_all(MYSQLI_ASSOC);
            }

            return $row;
        }

    }


    class Cafe extends Producto{
        protected $ingredientes;
        protected $envase;
        protected $tipo_cafe;

        public function __construct($nombre, $precio, $codigo, $categoria, $marca, $ingredientes, $envase, $tipo_cafe, $conexion){
            parent::__construct($nombre, $precio, $codigo, $categoria, $marca, $conexion);
            $this->ingredientes = $ingredientes;
            $this->envase = $envase;
            $this->tipo_cafe = $tipo_cafe;
        }

        public function agregar(){
            $sql = "INSERT INTO producto(nombre, precio, codigo, fo_categoria, fo_marca, ingredientes, envase, tipo_cafe) VALUES ('$this->nombre', $this->precio, '$this->codigo', $this->categoria, $this->marca, '$this->ingredientes', '$this->envase', '$this->tipo_cafe')";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto agregado correctamente";
            }else{
                echo "Error al agregar el producto";
            }        
        }

        public function editar($id, $parametros){
            $sql = "UPDATE producto SET nombre = '$parametros[nombre]', precio = $parametros[precio], codigo = '$parametros[codigo]', fo_categoria = $parametros[categoria], fo_marca = $parametros[marca], ingredientes = '$parametros[ingredientes]', envase = '$parametros[envase]', tipo_cafe = '$parametros[tipo_cafe]' WHERE id_producto = ".$id;
            // $sql = "UPDATE producto SET nombre = '$nombre', precio = '$precio', codigo = '$codigo', categoria = '$categoria', marca = '$marca', ingredientes = 'ingredientes', envase = '$envase', tipo_cafe = 'tipo_cafe' WHERE codigo = '$codigo'";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto editado correctamente";
            }else{
                echo "Error al editar el producto";
            }
        }

        public function eliminar($id){
            $sql = "DELETE FROM producto WHERE `producto`.`id_producto` = $id";
            mysqli_query($this->conexion, $sql) or die ("Error al eliminados los datos");
            return $mensaje = "Datos eliminados correctamente";
        }

    }


    class no_consumible extends Producto{
        protected $cantidad;
        protected $tipo_producto;
        protected $codigo_barra;
        protected $fecha_vencimiento;
        protected $lote;

        public function __construct($nombre, $precio, $codigo, $categoria, $marca, $cantidad, $tipo_producto, $codigo_barra, $fecha_vencimiento, $lote, $conexion){
            parent::__construct($nombre, $precio, $codigo, $categoria, $marca, $conexion);
            $this->cantidad = $cantidad;
            $this->tipo_producto = $tipo_producto;
            $this->codigo_barra = $codigo_barra;
            $this->fecha_vencimiento = $fecha_vencimiento;
            $this->lote = $lote;
        }

        public function agregar(){
            $sql = "INSERT INTO producto (nombre, precio, codigo, fo_categoria, fo_marca, cantidad, tipo_producto, codigo_barra, fecha_vencimiento, lote) VALUES ('$this->nombre', '$this->precio', '$this->codigo', '$this->categoria', '$this->marca', '$this->cantidad', '$this->tipo_producto', '$this->codigo_barra', '$this->fecha_vencimiento', '$this->lote')";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto agregado correctamente";
            }else{
                echo "Error al agregar el producto";
            }
        
        }

        public function editar($id, $parametros){
            // $sql = "UPDATE producto SET nombre = '$parametros[nombre]', precio = $parametros[precio], codigo = '$parametros[codigo]', fo_categoria = $parametros[categoria], fo_marca = $parametros[marca], ingredientes = '$parametros[ingredientes]', envase = '$parametros[envase]', tipo_cafe = '$parametros[tipo_cafe]' WHERE id_producto = ".$id;
            $sql = "UPDATE producto SET nombre = '$parametros[nombre]', precio = $parametros[precio], codigo = '$parametros[codigo]', fo_categoria = $parametros[categoria], fo_marca = $parametros[marca], cantidad = $parametros[cantidad], tipo_producto = '$parametros[tipo_producto]', codigo_barra = '$parametros[codigo_barra]', fecha_vencimiento = '$parametros[fecha_vencimiento]', lote = '$parametros[lote]' WHERE id_producto = $id";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto editado correctamente";
            }else{
                echo "Error al editar el producto";
            }
        }

        public function consultarEspecifico(){
            $sql = 'SELECT producto.id_producto, producto.nombre, producto.precio, producto.codigo, categoria.nombre as nombreCategoria, marca.nombre as nombreMarca, producto.cantidad, producto.tipo_producto, producto.codigo_barra, producto.fecha_vencimiento, producto.lote FROM `producto` INNER JOIN categoria on producto.fo_categoria = categoria.id_categoria INNER JOIN marca on producto.fo_marca = marca.id_marca WHERE ingredientes IS NULL AND envase IS NULL AND tipo_cafe IS NULL;';
            $resultado = mysqli_query($this->conexion, $sql) or die ("Error al consultar los datos");
            $row = [];
            if($resultado->num_rows > 0) {
                $row = $resultado->fetch_all(MYSQLI_ASSOC);
            }

            return $row;
        }


    }

    class consumible extends Producto{
        protected $tipo_consumible;
        protected $cantidad;

        public function __construct($nombre, $precio, $codigo, $categoria, $marca, $tipo_consumible, $cantidad, $conexion){
            parent::__construct($nombre, $precio, $codigo, $categoria, $marca, $conexion);
            $this->tipo_consumible = $tipo_consumible;
            $this->cantidad = $cantidad;
        }

        public function agregar(){
            $sql = "INSERT INTO producto (nombre, precio, codigo, fo_categoria, fo_marca, tipo_consumible, cantidad) VALUES ('$this->nombre', '$this->precio', '$this->codigo', '$this->categoria', '$this->marca', '$this->tipo_consumible', '$this->cantidad')";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto agregado correctamente";
            }else{
                echo "Error al agregar el producto";
            }
        
        }

        public function editar($id, $parametros){
            $sql = "UPDATE producto SET nombre = '$parametros[nombre]', precio = $parametros[precio], codigo = '$parametros[codigo]', fo_categoria = $parametros[categoria], fo_marca = $parametros[marca], tipo_consumible = '$parametros[tipo_consumible]', cantidad = $parametros[cantidad] WHERE id_producto = $id";
            $resultado = mysqli_query($this->conexion, $sql);
            if($resultado){
                echo "Producto editado correctamente";
            }else{
                echo "Error al editar el producto";
            }
        }

        public function consultarEspecifico(){
            $sql = 'SELECT producto.id_producto, producto.nombre, producto.precio, producto.codigo, categoria.nombre as nombreCategoria, marca.nombre as nombreMarca, producto.tipo_consumible, producto.cantidad FROM `producto` INNER JOIN categoria on producto.fo_categoria = categoria.id_categoria INNER JOIN marca on producto.fo_marca = marca.id_marca WHERE ingredientes IS NULL AND envase IS NULL AND tipo_cafe IS NULL;';
            $resultado = mysqli_query($this->conexion, $sql) or die ("Error al consultar los datos");
            $row = [];
            if($resultado->num_rows > 0) {
                $row = $resultado->fetch_all(MYSQLI_ASSOC);
            }

            return $row;
        }

    }

    
    // $variable = new Cafe("cafe", 1000, 1, "comestible", "juan valdez", "cafe", "bolsa", "arabica", $conn);
    // echo '<pre>';
    // print_r($variable->consultar());
    // echo '</pre>';
