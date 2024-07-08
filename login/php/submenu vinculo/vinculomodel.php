<?php
    require_once "../conexion.php";
    class vinculomodel{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
        
        public function getVinculos(){
            $arrregistros = array();
            $rs = $this->conexion->query("CALL mos_alum_mate()");
            while($obj = $rs->fetch_object()){
                array_push($arrregistros,$obj);
            }
            return $arrregistros;
        }

        public function insertvinculo(string $id, string $nromatricula){
            $sql = $this->conexion->query("CALL alta_alum_mate('{$id}','{$nromatricula}')");
            $sql = $sql->fetch_object();
            return $sql;    
        }

        public function updatevinculo(string $id, string $nromatricula, string $idm, string $nromatriculam){
            $sql = $this->conexion->query("CALL mod_alum_mate('{$id}','{$nromatricula}','{$idm}','{$nromatriculam}')");
            $sql = $sql->fetch_object();
            return $sql;
        }

        public function delvinculo(string $id, string $nromatricula){
            $sql = $this->conexion->query("CALL elim_alum_mate('{$id}','{$nromatricula}')");
            $sql = $sql->fetch_object();
            return $sql;
        }
    }
?>