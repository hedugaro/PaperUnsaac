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
$url = "../../View/admin/dashboard.php";
$UpperCss = "style='text-transform:uppercase;'";
$UpperJs = "onkeyup='javascript:this.value=this.value.toUpperCase();'";
//Solo el contenido que cambiara ira aqui
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Formulario para canje de dinero del usuario</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-heading">
      <table width = "100%" >
        <tr>
          <th>
            Banco BBVA
          </th>



          <td>
          Total Tokens 15 000 000
          </td>

        </tr>
      </table>
    </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form role="form" method="post" action="<?php echo $url?>">
                      <div class="form-group">
                          <label>ENTREGAR FONDOS</label>
                      </div>
                      <div class="form-group">
                          <label>Beneficiario</label>
                          <table width = "100%">
                            <tr>
                               <td> <input class="form-control" <?php echo $UpperCss.' '.$UpperJs;?> name="beneficiario"></td>
                               <td> <button  class="btn btn-success">QR</button></td>
                            </tr>
                          </table>
                          <p class="help-block">Ejemplo: 0x3rbsdjcndknknksdcnknkdvjbfjbvxjhldbf.</p>
                      </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <span>S/.</span><input class="form-control" <?php echo $UpperCss.' '.$UpperJs;?> min="0.01" step="0.01" max="250000000" name="cantidad" type= "number" >
                            <p class="help-block">Ejemplo: 4578.00 .</p>
                        </div>
                        <button type="submit" class="btn btn-success">Entregar</button>
                        <button type="reset" class="btn btn-warning">Resetear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//Llamamos al footer y se cierra la pagina
Layout::footer();
?>
