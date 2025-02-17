<?php 

require_once "conexion.php";


class Modelogrados{

/*=============================================
	MOSTRAR gradoS
	=============================================*/

    static public function mdlMostrargrados($tabla,$item,$valor){

         if($item !=null){

            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

            $stmt->bindParam(":".$item ,$valor,PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        }else{

        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        }


      $stmt->close();
        $stmt=null;
  }



  /*=============================================
	CREAR grado
	=============================================*/

  static public function mdlIngresargrado($tabla,$datos){

    $stmt=Conexion::conectar()->prepare("   INSERT INTO $tabla(grados) VALUES(:grado)");

    $stmt->bindParam(":grado" ,$datos,PDO::PARAM_STR);

    if($stmt->execute()){

        return "ok";

    }else{

        return "error";

    }

    $stmt->close();
    $stmt=null;



  }




  static public function mdlEditargrado($tabla,$datos){

    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET grados=:grado  WHERE id=:id");


    $stmt->bindParam(":grado" ,$datos["grado"],PDO::PARAM_STR);
    $stmt->bindParam(":id" ,$datos["id"],PDO::PARAM_STR);

      if($stmt->execute()){

        return "ok";

    }else{

        return "error";

    }

    $stmt->close();
    $stmt=null;







  }


  static public function mdlBorrargrado($tabla, $datos){
  
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
  
      $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
  
      if($stmt -> execute()){
  
        return "ok";
      
      }else{
  
        return "error";	
  
      }
  
      $stmt -> close();
  
      $stmt = null;
  
    }
  
  
  
  
          
  
  
  
  
    
  }
  
  
  ?>