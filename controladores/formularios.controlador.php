<?php
class ControladorFormularios
{
    /*
    REGISTRO
    */
    static public function crtRegistro()
    {
        if (isset($_POST["registerName"])) {
            if (
                preg_match("/^[a-zA-Z ]+$/", $_POST["registerName"]) && 
                preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$/', $_POST ["registerEmail"]) && 
                preg_match('/^[0-9a-zA-Z]+$/', $_POST ["registerPassword"])){
                
                $tabla = "registros_pza_wedding";
                $token = md5($_POST["registerName"] . "+" . $_POST ["registerEmail"]);
                
                $datos = array("token" => $token,
                    "nombre" => $_POST["registerName"],
                    "email" => $_POST["registerEmail"],
                    "password" => $_POST["registerPassword"]
                );
                
                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
                return $respuesta;
            }else{
                $respuesta ="error";
                return $respuesta;

            }

        }
    }

    /**
     * Selecion de registros de la tabla
     */
    static public function ctrSeleccionarRegistros($item, $valor)
    {
        if ($item == null && $valor == null) {
            $tabla = "registros_pza_wedding";

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, null, null);

            return $respuesta;
        } else {
            $tabla = "registros_pza_wedding";

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            return $respuesta;
        }

    }
    /**
     * Ingreso
     */
    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "registros_pza_wedding";
            $item = "email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if (is_array($respuesta)) {
                if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {

                    $_SESSION["validarIngreso"] = "ok";

                    echo "Ingreso Exitoso";

                    echo '<script>
                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        setTimeout(function(){
                            window.location.href = "index.php?pagina=inicio";
                        }, 2000);
                    </script>';
                } else {
                    echo '<script>
                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-danger">Ha ocurrido un error</div>';
                }
            } else {
                echo '<script>
                    if (window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-danger">Ha ocurrido un error';
            }
        }

    }

    static public function ctrActualizarRegistro()
    {


        if (isset($_POST["updateName"])) {
            if ($_POST["updatePassword"] != "") {
                $password = $_POST["updatePassword"];
            } else {
                $password = $_POST["passwordActual"];
            }
            $tabla = "registros_pza_wedding";

            $datos = array(
                "id" => $_POST["id"],
                "nombre" => $_POST["updateName"],
                "email" => $_POST["updateEmail"],
                "password" => $password
            );

            $actualizar = ModeloFormularios::mdlActualizarRegistros($tabla, $datos);

            return $actualizar;
        }


    }

    public function ctrEliminarRegistro()
    {
        if (isset($_POST["deleteRegistro"])) {

            $tabla = "registros_pza_wedding";
            $valor = $_POST["deleteRegistro"];


            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

            if ($respuesta == "ok") {
                echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>    ';
                echo '<div class="alert-success">Se ha eliminado a el usuario</div>
                    <script>
                    setTimeout(function(){
                    window.location = "index.php?pagina=inicio";
                    },3000);
                    </script>
                    ';
            }
        }
    }

}

?>

