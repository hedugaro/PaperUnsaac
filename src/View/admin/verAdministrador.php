<?php
session_start();
require_once '../../util/Sesion.php';
require_once '../../Layout/Layout.php';
if(Session::NoExisteSesion("user") ) {
    header("location: ../login.php");
    return;
}
$Usuario = Session::getSesion("user");
//Llamamos al menu
Layout::menu("", $Usuario);
$url = "../bancos/page1.php";
//Solo el contenido que cambiara ira aqui
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ver Administrador
        <a href="<?php echo $url;?>" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-hand-left"></span> Volver
        </a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Solo se visualiza informacion del administrador
        </div>
        <div class="panel-body">
            <div class="row">
                <form role="form"  action="<?php echo $url; ?>">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Id</label>
                        <input class="form-control" disabled="" value="<?php echo $_REQUEST['id']?>" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nombre de adminstrador</label>
                        <input class="form-control" disabled="" value="<?php echo $_REQUEST['nombre']?>" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nombre de Usuario </label>
                        <input class="form-control"  disabled="" value="<?php echo $_REQUEST['user']?>" type="text">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input class="form-control"  disabled="" value="<?php echo $_REQUEST['pass']?>" type="text">
                    </div>


                </div>
                </form>
        </div>
    </div>
</div>
<?php Layout::footer(); ?>
