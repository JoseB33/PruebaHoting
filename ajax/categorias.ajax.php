<?php 

require_once "../controladores/grados.controlador.php";
require_once "../modelo/grados.modelo.php";



class Ajaxgrados{


    /*=============================================
	EDITAR CATEGORÍA
	=============================================*/
    
    public $idgrado;

    public function ajaxEditargrado(){

        $item="id";
        $valor=$this->idgrado;

        $respuesta = Controladorgrados::ctrMostrargrados($item,$valor);

        echo json_encode($respuesta);






    }





}


/*=============================================
EDITAR CATEGORÍA
=============================================*/	


if(isset($_POST["idgrado"])){


    $grado=new Ajaxgrados();
    $grado->idgrado=$_POST["idgrado"];
    $grado->ajaxEditargrado();


}



?>