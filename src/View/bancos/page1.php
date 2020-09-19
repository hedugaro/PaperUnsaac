<?php
session_start();
require_once '../../util/Sesion.php';
require_once '../../Layout/Layout.php';
if(Session::NoExisteSesion("user") ) {
    header("location: ../login.php");
    return;
}

if(Session::NoExisteSesion("lista") ) {
    header("location: ../../Controller/LoginController.php?Op=Listar");
    return;
}
$Lista= Session::getSesion("lista");

$Usuario = Session::getSesion("user");
//Llamamos al menu
Layout::menu("", $Usuario);
$url = "../../Controller/LoginController.php?Op=";
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

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Relacion de Analisis de Diversidad
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                    <th>id</th>
                                    <th>Nombre Administrador</th>
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php
                            $url = "../../Controller/LoginController.php?id=";
                            foreach ($Lista as $row ) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $row['idTAdministrador']?></td>
                                <td><?php echo $row['nombreAdministrador']?></td>
                                <td><?php echo $row['usuario']?></td>
                                <td><?php echo $row['password']?></td>
                                <td class="center">
                                    <ul class="nav nav-pills">
                                        <li>
                                            <a href="<?php echo $url . $row['idTAdministrador'] ?>&Op=Ver" title="Ver">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $url . $row['idTAdministrador'] ?>&Op=Recuperar" title="Editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $url . $row['idTAdministrador'] ?>&Op=Eliminar" title="Eliminar"
                                               onclick="return confirm('Se eliminara este registro, ¿Estas Seguro?');">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php
//Llamamos al footer y se cierra la pagina
Layout::footer();
?>
