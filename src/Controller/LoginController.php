<?php
session_start();
require_once '../Model/LoginModel.php';
require_once '../util/Sesion.php';

//echo $_REQUEST["email"].$_REQUEST["pass"].$_REQUEST["Op"];
try {
    //recuperamos la operacion
    $Op = $_REQUEST["Op"];
    $model = new LoginModel();
    switch ($Op) {

          case 'Autenticar':
              $model->setUser($_REQUEST["user"]);
              $model->setPass($_REQUEST["pass"]);
              $recUser = $model->autenticar();
              if(($recUser == null) || ($recUser["password"] != $_REQUEST["pass"])){
                  //throw new Exception("Usuario o Clave incorrecta!!!!");
                  var_dump($recUser);
                  Session::setSesion("error", "Usuario o Clave incorrecta!!!!".$recUser["password"]);
                  $target = "../View/login.php";
              }
              else{
                  Session::setSesion("user", $recUser);
                  $target = "../View/admin/dashboard.php";
              }
              break;
            case 'Listar':
                $Lista = $model->listar();
                var_dump($Lista);
                Session::setSesion("lista", $Lista);
                $target = "../View/login.php";
                break;
            case 'Guardar':

                $model->setNombre($_REQUEST["nombres"]);
                $model->setUser($_REQUEST["usuario"]);
                $model->setPass($_REQUEST["pass"]);

                $msg = $model->insertar();

                Session::setSesion("mensaje", $msg);
                $target = "LoginController.php?Op=Listar";
                break;
            case 'Ver':
                $id = $_REQUEST["id"];
                $Consulta=$model->recuperarUnAdministrador($id);
                $nombre = $Consulta['nombreAdministrador'];
                $user = $Consulta['usuario'];
                $pass = $Consulta['password'];

                $target = "../View/admin/verAdministrador.php?id=".$id."&nombre=".$nombre."&user=".$user."&pass=".$pass;
                break;
            case 'Recuperar':
                $id = $_REQUEST["id"];
                $Consulta=$model->recuperarUnAdministrador($id);
                $nombre = $Consulta['nombreAdministrador'];
                $usuario = $Consulta['usuario'];
                $pas = $Consulta['password'];
                $target = "../View/admin/editarAdministrador.php?nombre=".$nombre."&user=".$user."&pass=".$pass;
                break;
            case 'Editar':
                $model->setId($_REQUEST["id"]);
                $model->setNombre($_REQUEST["nombre"]);
                $model->setUser($_REQUEST["user"]);
                $model->setPass($_REQUEST["pass"]);

                $msg = $model->editar();
                Session::setSesion("mensaje", $msg);
                $target = "LoginController.php?Op=Listar";
                break;
            case 'Eliminar':
                $model->setId($_REQUEST["id"]);
                $msg = $model->eliminar();
                Session::setSesion("mensaje", $msg);
                $target = "LoginController.php?Op=Listar";
                break;
    }

} catch (Exception $e) {
    Session::setSesion("mensajeErr", $e->getMessage());
    echo 'error!!!!';
}
//Redireccionamos
header("location: $target");

//print_r($recUser);
