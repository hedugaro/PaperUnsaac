<?php
require_once '../util/Util.php';
class AccesoDB {

    // Variable que representa la conexión con el servidor
    private $cn = null;    
    // Implementación del patrón Singleton
    private static  $instancia = null;
    
    public static function getInstancia() {
               
        if( self::$instancia == null ) {
                self::$instancia = new AccesoDB();
        }
        return self::$instancia;
    }

    // Método privado que retorna la conexión con el servidor
    private function getConnection() {
        // Datos de conexión
        $parametros = parse_ini_file("../conf/conexion.ini");
        $server = $parametros["01"];
        $user = $parametros["02"];
        $pass=$parametros["03"];
        $db=$parametros["04"];
        if($this->cn == null) {
            try {
                $this->cn = mysqli_connect($server,$user,$pass,$db);
                if($this->cn) {
//                    echo 'ok';
                }
                else {                     
                    throw new Exception("No se tiene acceso al servidor o la Base de datos no existe.");
                }
            } catch( Exception $e ) {
                throw $e;
            }
        }
        return $this->cn;
    }

    // Ejecuta una consulta y retorna el resultado como un arreglo
    public function executeQuery( $query ) {
        try {
            $cn = $this->getConnection();
            
            $rs = mysqli_query($cn,$query);
            if(mysqli_errno($cn)) {
                throw new Exception(mysqli_error($cn));
            }
            $lista = array();
            while ($row = mysqli_fetch_assoc($rs)) {
                    $lista[] = $row;
            }
            mysqli_free_result($rs); 
            //agrego esta linea para que pueda realizar 
            //dos consultas a la vez en la BD
            mysqli_next_result($this->cn);
//            mysqli_close();
            return $lista;
        } catch( Exception $e ) {
            Util::save_log( $e, $query );
            throw $e;
        }
    }
}

//$basedatos = AccesoDB::getInstancia();
//////$basedatos = new AccesoDB();//Solo si no funciona la linea de arriba
//$resultado =  $basedatos->executeQuery("select * from usuario");
// print_r($resultado);
?>
