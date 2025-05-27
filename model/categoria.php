<?php

    class Categoria{
        private $conexion;

        //TODOS LOS METODOS SIRVEN
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consultar(){
            $sql = "SELECT * FROM categoria ORDER BY id_categoria";
            $resultado = mysqli_query($this->conexion, $sql) or die ("Error al consultar los datos");

            $row = [];
            if($resultado->num_rows > 0) {
                $row = $resultado->fetch_all(MYSQLI_ASSOC);
            }
             
            return $row;
        }

        public function agregar($parametros){
            $sql = "INSERT INTO categoria(nombre, descripcion)
                        VALUES('$parametros[nombre]', '$parametros[descripcion]')";
            mysqli_query($this->conexion, $sql) or die ("Error al agregar los datos");
            return $mensaje = "Datos agregados correctamente";
        }

        public function eliminar($id){
            $sql = "DELETE FROM categoria WHERE id_categoria = ".$id;
            mysqli_query($this->conexion, $sql) or die ("Error al eliminados los datos");
            return $mensaje = "Datos eliminados correctamente";
        }

        public function editar($id, $parametros){
            $sql = "UPDATE categoria SET nombre = '$parametros[nombre]', descripcion = '$parametros[descripcion]' WHERE id_categoria = ".$id;
            mysqli_query($this->conexion, $sql) or die ("Error al editar los datos");
            return $mensaje = "Datos editados correctamente";
        }
    }

    // $cate = new Categoria($conn);
    // $cate->eliminar(4);
    // $cate->editar(5, ['nombre' => 'testiada', 'descripcion' => 'eu mani este es un test']);
    // echo '<pre>';
    // print_r($cate->consultar());
    // echo '</pre>';

    // $cate->agregar(['nombre' => 'almuerzoTest', 'descripcion' => 'Un test para ver si funciona']);
