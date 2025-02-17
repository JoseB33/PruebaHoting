<?php
class ControladorUsuarios
{
    /*==MOSTRAR USUARIOS==*/
    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }
    /*==EDITAR USUARIO==*/
    static public function ctrEditarUsuario()
    {
        if (isset($_POST["editarNombre"])) {
            /*==VALIDAR IMAGEN==*/
            $tabla = "usuarios";
            if ($_POST["editarPassword"] != "") {
                $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            } else {
                $encriptar = $_POST["passwordActual"];
            }
            $datos = array(
                "nombre" => $_POST["editarNombre"],
                "usuario" => $_POST["editarUsuario"],
                "password" => $encriptar,
                "perfil" => $_POST["editarPerfil"],
            );
            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
            if ($respuesta == "ok") {
                echo "<script>
                        Swal.fire({
                        title: 'El usuario ha sido editado correctamente',
                        icon: 'success',
                        }).then((result) => {
                            window.location = 'usuarios';
                        })
                    </script>";
            }
        }
    }
    /*==REGISTRO DE USUARIO==*/
    static public function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoNombre"])) {
            /*==VALIDAR IMAGENES==*/
            $tabla = "usuarios";
            $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $datos = array(
                "nombre" => $_POST["nuevoNombre"],
                "usuario" => $_POST["nuevoUsuario"],
                "password" => $encriptar,
                "perfil" => $_POST["nuevoPerfil"],
            );
            $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
            if ($respuesta == "ok") {
                echo "<script>
                        Swal.fire({
                        title: '¡El usuario ha sido Guardado correctamente!',
                        icon: 'success',
                        }).then((result) => {
                            window.location = 'usuarios';
                        })
                    </script>"
                ;
            } else {
                echo '<script>
                    alert("Error al crear el usuario");
                </script>';
            } {
            }
        }
    }
    /*==BORRAR USUARIO==*/
    static public function ctrBorrarUsuario()
    {
        if (isset($_GET["idUsuario"])) {
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];
            $respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla, $datos);
            if ($respuesta == "ok") {
                echo "<script>
                        Swal.fire({
                        title: '¡El usuario ha sido borrado correctamente!',
                        icon: 'success',
                        }).then((result) => {
                            window.location = 'usuarios';
                        })
                    </script>";
            }
        }
    }
}
