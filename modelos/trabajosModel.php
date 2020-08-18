<?php

    class trabajosModel{
    private $con;

    public function __construct(){
        $this->con=Conectar::getConexion();
    }
    public function getTrabajos(){
        $stmt=$this->con->prepare("select * from trabajos;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveTrabajo($datos){

        $stmt=$this->con->prepare("insert into
          trabajos (cliente,placa, fechaInicio)
           values (?,?,?)");
  
        $stmt->bindParam(1,$datos['cliente']);
        $stmt->bindParam(2,$datos['placa']);
        $stmt->bindParam(3,$datos['fechaInicio']);
  
        return $stmt->execute();
      }
  
      public function viewTrabajo($id){
        $stmt=$this->con->prepare("select * from trabajos where id = ?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }
  
      public function updateTrabajo($datos){
  
        $stmt=$this->con->prepare("update trabajos set cliente = ?,placa = ?,fechaInicio= ? , fechaFin= ? , diagnostico = ?, descripcion = ?,materiales = ? where id = ? ");
  
        $stmt->bindParam(1,$datos['cliente']);
        $stmt->bindParam(2,$datos['placa']);
        $stmt->bindParam(3,$datos['fechaInicio']);
        $stmt->bindParam(4,$datos['fechaFin']);
        $stmt->bindParam(5,$datos['diagnostico']);
        $stmt->bindParam(6,$datos['descripcion']);
        $stmt->bindParam(7,$datos['materiales']);
        $stmt->bindParam(8,$datos['id']);
  
        return $stmt->execute();
      }
  
      public function deleteTrabajo($id){
  
        $stmt=$this->con->prepare("delete from trabajos where id = ?");
        $stmt->bindParam(1,$id);
        return $stmt->execute();
      }

    }
?>