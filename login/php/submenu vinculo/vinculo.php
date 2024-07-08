<?php

    require_once "vinculomodel.php";

    $option = $_REQUEST['op'];
    $objvinculo = new vinculomodel();

    if($option == "listregistros"){
        $arrresponse = array('status' => false, 'data' => "");
        $arrvinculo = $objvinculo->getVinculos();
        if(!empty($arrvinculo)){
            $arrresponse['status'] = true;
            $arrresponse['data'] = $arrvinculo;
        }
        echo json_encode($arrresponse);
        die();
    }

    if($option == "registro"){
        if(empty($_POST['Id']) || empty($_POST['NroMat'])){
        $arrresponse = array('status' => false, 'data' => "Error de datos");
        }else{
            $strId = trim($_POST['Id']);
            $strNroMat = trim($_POST['NroMat']);
            $arrvinculo = $objvinculo->insertvinculo($strId,$strNroMat);
        }
    }

    if($option == "modificar"){
        if($_POST){ 
            if(empty($_POST['Id']) || empty($_POST['NroMat']) || empty($_POST['IdM']) || empty($_POST['NroMatM'])){
                $arrresponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strId = trim($_POST['Id']);
                $strNroMat = trim($_POST['NroMat']);
                $strIdM = trim($_POST['IdM']);
                $strNroMatM = trim($_POST['NroMatM']);
                $arrvinculo = $objvinculo->updatevinculo($strId,$strNroMat,$strIdM,$strNroMatM);
            }
            }
            die();
    }

    if($option == "eliminar"){
        if($_POST){ 
            if(empty($_POST['Id']) || empty($_POST['NroMat'])){
                $arrresponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strId = trim($_POST['Id']);
                $strNroMat = trim($_POST['NroMat']);
                $arrvinculo = $objvinculo->delvinculo($strId,$strNroMat);
            }
            }
        die();
    }

    die();

?>