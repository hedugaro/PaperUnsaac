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
        <h1 class="page-header">Formulario para la reparticion de dinero del estado</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
      <table width = "100%" >
        <tr>
          <th>
            Banco Central de Reserva del Perú
          </th>



          <td>
          Total Tokens 230 000 000
          </td>

        </tr>
      </table>
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form role="form" method="post" action="<?php echo $url?>">

                        <div class="form-group">
                            <label>Elija el Banco </label>
                            <select name="idtrab" class="form-control" autofocus>


                            <option selected = "selectec" value="idbbva"> BBVA </option>
                            <option value="idcp"> BCP </option>
                            <option value="idlc"> La Caja </option>
                            <option value="idintbk"> Interbank </option>
                            <option value="idsntd"> Santander </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <span>S/.</span><input class="form-control" <?php echo $UpperCss.' '.$UpperJs;?> min="0.01" step="0.01" max="250000000" name="cantidad" type= "number" >
                            <p class="help-block">Ejemplo: 4578.78 .</p>
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
