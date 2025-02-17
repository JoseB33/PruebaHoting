<?php

class Controladorgrados
{


    static public function ctrMostrargrados($item, $valor)
    {

        $tabla = "grados";

        $respuesta = Modelogrados::mdlMostrargrados($tabla, $item, $valor);

        return $respuesta;
    }


    static public function ctrCreargrado()
    {

        if (isset($_POST["nuevagrado"])) {

            $tabla = "grados";

            $datos = $_POST["nuevagrado"];

            $respuesta = Modelogrados::mdlIngresargrado($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>

                        Swal.fire({
                        title: '¡La grado Ha Sido Guardada Correctamente!',
                        icon: 'success',
                        }).then((result) => {
                            window.location = 'grados';
                        })
                                            
                    </script>";
            }
        }
    }




    static public function ctrEditargrado()
    {

        if (isset($_POST["editargrado"])) {


            $tabla = "grados";

            $datos = array(
                "grado" => $_POST["editargrado"],
                "id" => $_POST["idgrado"]
            );

            $respuesta = Modelogrados::mdlEditargrado($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>

                        Swal.fire({
                        title: '¡La grado Ha Sido Editada Correctamente!',
                        icon: 'success',
                        }).then((result) => {
                            window.location = 'grados';
                        })
                                            
                    </script>";
            }
        }
    }




    static public function ctrBorrargrado()
    {

        if (isset($_GET["idgrado"])) {


            $tabla = "grados";
            $datos = $_GET["idgrado"];

            $respuesta = Modelogrados::mdlBorrargrado($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>

					Swal.fire({
                        title: '¡la grado ha sido guardada correctamente!',
                        icon: 'success',
                        }).then((result) => {

                            window.location = 'grados';

                        })
						

					</script>";
            }
        }
    }
}
