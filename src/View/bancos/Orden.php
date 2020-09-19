<?php

require_once '../../Layout/Layout.php';

//estas variables se definen en una sola linea
$jsm = "<link href='../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css' rel='stylesheet'>";
$jsm.= "<link href='../../bower_components/datatables-responsive/css/dataTables.responsive.css' rel='stylesheet'>";
//Llamamos al menu
Layout::menu($jsm);
//$print = "../../Controller/OrdenController.php?Op=";
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ORDEN
            <a href="<?php echo "../../View/orden/nuevoOrden.php";?>" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-plus"></span> Agregar
            </a>

        </h1>
      
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Relacion de Ordenes
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <div class="dataTable_wrapper">


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
$jsf = "<script src='../../bower_components/DataTables/media/js/jquery.dataTables.min.js'></script>";
$jsf.="<script src='../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js'></script>";
Layout::footer($jsf);
?>
