<?php

    require_once "alumnomodel.php";

    $option = $_REQUEST['op'];
    $objalumno = new alumnomodel();

    if($option == "listregistros"){
        $arrresponse = array('status' => false, 'data' => "");
        $arralumno = $objalumno->getAlumnos();
        if(!empty($arralumno)){
            $arrresponse['status'] = true;
            $arrresponse['data'] = $arralumno;
        }
        echo json_encode($arrresponse);
        die();
    }

    if($option == "registro"){
       if($_POST){ 
        if(empty($_POST['NroMat']) || empty($_POST['Nombre']) || empty($_POST['Fecha'])){
            $arrresponse = array('status' => false, 'msg' => 'Error de datos');
        }else{
            $strNroMat = ucwords(trim($_POST['NroMat']));
            $strNombre = ucwords(trim($_POST['Nombre']));
            $strFecha = trim($_POST['Fecha']);
            $arralumno = $objalumno->insertAlumno($strNroMat,$strNombre,$strFecha);
        }
        }
        die();
    }

    if($option == "modificar"){
        if($_POST){ 
            if(empty($_POST['NroMat']) || empty($_POST['Nombre']) || empty($_POST['Fecha'])){
                $arrresponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strNroMat = ucwords(trim($_POST['NroMat']));
                $strNombre = ucwords(trim($_POST['Nombre']));
                $strFecha = trim($_POST['Fecha']);
                $arralumno = $objalumno->updateAlumno($strNroMat,$strNombre,$strFecha);
            }
            }
            die();
    }

    if($option == "eliminar"){
        if($_POST){ 
            if(empty($_POST['NroMat'])){
                $arrresponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strNroMat = trim($_POST['NroMat']);
                $arralumno = $objalumno->delalumno($strNroMat);
            }
            }
        die();
    }

    die();

?>