<?php
require_once '../BD/AccesoDB.php';

class LoginModel{

    private $idTAdministrador;
    private $nombreAdministrador;
    private $usuario;
    private $password;

    function getId(){ return $this->idTAdministrador; }
    function setId($id){
        $this->idTAdministrador = $id;
    }

    function getNombre(){ return $this->nombreAdministrador; }
    function setNombre($nombre){
        $this->nombreAdministrador = $nombre;
    }

    function getPass(){ return $this->password; }
    function setPass($pass){
        $this->password = $pass;
    }

    function getUser(){ return $this->usuario; }
    function setUser($user){
        $this->usuario = $user;
    }



    // Consulta los datos de un usuario por su nombre de usuario
    public function autenticar(){
        try {
            $user = self::getUser();
            $pass = self::getPass();

            $query = "select * from TAdministrador where usuario = '$user' and password = '$pass'";
            echo $query;
//            $query = "call spu_recuperarUsuario('$usuario')";
            $db = new AccesoDB();
            $lista = $db->executeQuery($query);
            $rec = null;
            if( count($lista) == 1 ){
                $rec = $lista[0];
            }
            return $rec;
        } catch (Exception $e) {
            throw $e;
        }
    }
    //----metodos----------------
  function listar(){
      try {
          $query="call spu_listarAdministrador();";
          $db = AccesoDB::getInstancia();
          $lista = $db->executeQuery($query);
          return $lista;
      }catch (Exception $e) {
          throw $e;
      }
  }

  function insertar(){
      try {
          $nombre = $this->getNombre();
          $usuario = $this->getUser();
          $pass    = $this->getPass();

          $query="call spu_insertaAdministrador('$nombre','$usuario','$pass');";

          $db = AccesoDB::getInstancia();
          $lista = $db->executeQuery($query);
          $rec = $lista[0];
          return $rec;
      }catch (Exception $e) {
          throw $e;
      }
  }

  public function recuperarUnAdministrador($id){
      try {
          $query = "call spu_recuperarUnAdministrador('$id');";
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
          $nombres = self::getNombre();
          $usuario = self::getUser();
          $pass = self::getPas();


          $query="call spu_modificarAdministrador('$id','$nombres','$usuario','$pass');";
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
          $query="call spu_eliminarAdministrador('$id');";
          $db = AccesoDB::getInstancia();
          $lista = $db->executeQuery($query);
          $rec = $lista[0];
          return $rec;
      }catch (Exception $e) {
          throw $e;
      }
  }
}
?>
