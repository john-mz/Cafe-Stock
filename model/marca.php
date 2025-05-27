<?php
    class Marca{
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //TODOS LOS METODOS SIRVEN
        public function consultar(){
            $sql = "SELECT * FROM marca ORDER BY id_marca";
            $resultado = mysqli_query($this->conexion, $sql) or die ("Error al consultar los datos");
            $row = [];
            if($resultado->num_rows > 0) {
                $row = $resultado->fetch_all(MYSQLI_ASSOC);
            }

            return $row;
        }

        public function agregar($parametros){
            $sql = "INSERT INTO marca(nombre)
                        VALUES('$parametros[nombre]')";
            mysqli_query($this->conexion, $sql) or die ("Error al agregar los datos");
            return $mensaje = "Datos agregados correctamente";
        }

        public function eliminar($id){
            $sql = "DELETE FROM marca WHERE id_marca = ".$id;
            mysqli_query($this->conexion, $sql) or die ("Error al eliminados los datos");
            return $mensaje = "Datos eliminados correctamente";
        }

        public function editar($id, $parametros){
            $sql = "UPDATE marca SET nombre = '$parametros[nombre]' WHERE id_marca = ".$id;
            mysqli_query($this->conexion, $sql) or die ("Error al editar los datos");
            return $mensaje = "Datos editados correctamente";
        }
    }

// $marca = new Marca($conn);
// $marca->editar(1, ['nombre' => 'sello azul']);
// // $marca->eliminar(4);
// // $marca->agregar(['nombre' => 'cocacola']);
// echo '<pre>';
// print_r($marca->consultar());
// echo '</pre>';


