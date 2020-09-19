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

//Solo el que cambiara ira aqui
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">PLATFORM MODEL FOR PAYMENT DECENTRALIZATION</h1>
        MODELO DE PLATAFORMA PARA DESCENTRALIZACIÓN DE PAGOS
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
//Llamamos al footer y se cierra la pagina
Layout::footer();
?>
