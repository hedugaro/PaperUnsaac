<?php
require_once '../BD/AccesoDB.php';
class OrdenModel {
     //atributos
    private $id;
    private $nombreOrden;
    //propiedades
    function getId(){ return $this->id; }    
    function setId($cod){
        $this->id = $cod;
    }    
    function getNombreOrden(){ return $this->nombreOrden; }
    function setNombreOrden($nombres){
        $this->nombreOrden = $nombres;
    }
    //----metodos----------------
    function listar(){        
        try {
            $query="call spu_listarOrden();";
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            return $lista;
        }catch (Exception $e) {
            throw $e;
        }
    }
    
    function insertar(){
        try {
             echo "entrp aqui";
            $nombre = $this->getNombreOrden();
            echo $nombre;
            $query="call spu_insertarOrden('$nombre');";
            echo $query;
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            $rec = $lista[0];
            return $rec;
        }catch (Exception $e) {
            throw $e;
        }
    }
    
    public function recuperarUnOrden($id){
        try {        
            $query = "call spu_recuperarUnOrden('$id');";
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            $rec = $lista[0];
            return $rec;
        }catch (Exception $e){
            throw $e;
        }
        
    }
    
    //Edita una Categoria 
    public function editar(){
        try { 
            $id = self::getId();
            $nombres = self::getNombreOrden();              
            $query="call spu_modificarOrden('$id','$nombres');";
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            $rec = $lista[0];
            return $rec;
        }catch (Exception $e) {
            throw $e;
        }  
    }
    
    function eliminar(){
        try { 
            $id = self::getId();
            $query="call spu_eliminarOrden('$id');";
            //echo $query;
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            $rec = $lista[0];
            return $rec;
        }catch (Exception $e) {
            throw $e;
        }  
    }    
}



