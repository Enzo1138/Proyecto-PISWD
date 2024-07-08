<?php
    require_once "../conexion.php";
    class alumnomodel{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
        public function getAlumnos(){
            $arrregistros = array();
            $rs = $this->conexion->query("CALL mos_alum()");

            while($obj = $rs->fetch_object()){
                array_push($arrregistros,$obj);
            }
            return $arrregistros;
        }

        public function insertAlumno(string $Nromat, string $Nombre, string $Fecha){
            $sql = $this->conexion->query("CALL alta_alum('{$Nromat}','{$Nombre}','{$Fecha}')");
            $sql = $sql->fetch_object();
            return $sql;
        }

        public function updateAlumno(string $Nromat, string $Nombre, string $Fecha){
            $sql = $this->conexion->query("CALL mod_alum('{$Nromat}','{$Nombre}','{$Fecha}')");
            $sql = $sql->fetch_object();
            return $sql;
        }

        public function delalumno(int $Nromat){
            $sql = $this->conexion->query("CALL elim_alum('{$Nromat}')");
            $sql = $sql->fetch_object();
            return $sql;
        }
    }
?>