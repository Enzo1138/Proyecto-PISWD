<?php
    require_once "../conexion.php";
    class materiamodel{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
        
        public function getMaterias(){
            $arrregistros = array();
            $rs = $this->conexion->query("CALL mos_mate()");
            while($obj = $rs->fetch_object()){
                array_push($arrregistros,$obj);
            }
            return $arrregistros;
        }

        public function insertmateria(string $id, string $nombre){
            $sql = $this->conexion->query("CALL alta_mate('{$id}','{$nombre}')");
            $sql = $sql->fetch_object();
            return $sql;
        }

        public function updatemateria(string $id, string $nombre){
            $sql = $this->conexion->query("CALL mod_mate('{$id}','{$nombre}')");
            $sql = $sql->fetch_object();
            return $sql;
        }

        public function delmateria(string $id){
            $sql = $this->conexion->query("CALL elim_mate('{$id}')");
            $sql = $sql->fetch_object();
            return $sql;
        }
    }
?>