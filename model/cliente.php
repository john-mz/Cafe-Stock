<?php
    class Cliente{
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //TODOS LOS METODOS SIRVEN
        public function consultar(){
            $sql = "SELECT * FROM cliente ORDER BY id_cliente";
            $resultado = mysqli_query($this->conexion, $sql) or die ("Error al consultar los datos");

            $row = [];
            if($resultado->num_rows > 0) {
                $row = $resultado->fetch_all(MYSQLI_ASSOC);
            }
             
            return $row;
        }

        public function agregar($parametros){
            $sql = "INSERT INTO cliente(cedula, nombre, apellido, fecha, celular, email)
                        VALUES('$parametros[cedula]', '$parametros[nombre]' , '$parametros[apellido]' , '$parametros[fecha]' , '$parametros[celular]' , '$parametros[email]')";
            mysqli_query($this->conexion, $sql) or die ("Error al agregar los datos");
            return $mensaje = "Datos agregados correctamente";
        }

        public function inactivar($id){
            $id = $_GET['id'];
            $inactivar = $_GET['inactivar'];

            $sql = "UPDATE cliente SET inactivar = '$inactivar' WHERE id_cliente = ".$id;
            mysqli_query($this->conexion, $sql) or die ("Error al inactivar los datos");
            header('Location: index.php?vista=cliente');
        }

        public function editar($id, $parametros){
            $sql = "UPDATE cliente SET cedula = '$parametros[cedula]', nombre = '$parametros[nombre]' , apellido = '$parametros[apellido]' , fecha = '$parametros[fecha]' , celular = '$parametros[celular]' , email = '$parametros[email]' WHERE id_cliente = ".$id;
            mysqli_query($this->conexion, $sql) or die ("Error al editar los datos");
            return $mensaje = "Datos editados correctamente";
        }
    }


// $cliente = new cliente($conn);
// echo '<pre>';
// print_r($cliente->consultar());
// echo '</pre>';
// $cliente->editar(8, ['cedula' => '24234121234', 'nombre' => 'jasontest', 'apellido' => 'Agudelo', 'fecha' => '2024-04-23', 'celular' => '3218930234', 'email' => 'jason@gmail.com']);
// $cliente->inactivar(1); //no sirve

// $cliente->agregar(['cedula' => '24234121234', 'nombre' => 'jason', 'apellido' => 'Agudelo', 'fecha' => '2024-04-23', 'celular' => '3218930234', 'email' => 'jason@gmail.com']);