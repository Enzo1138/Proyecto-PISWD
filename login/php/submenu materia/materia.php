<?php

    require_once "materiamodel.php";

    $option = $_REQUEST['op'];
    $objmateria = new materiamodel();

    if($option == "listregistros"){
        $arrresponse = array('status' => false, 'data' => "");
        $arrmateria = $objmateria->getMaterias();
        if(!empty($arrmateria)){
            $arrresponse['status'] = true;
            $arrresponse['data'] = $arrmateria;
        }
        echo json_encode($arrresponse);
        die();
    }

    if($option == "registro"){
       if(empty($_POST['Id']) || empty($_POST['Nombre'])){
        $arrresponse = array('status' => false, 'data' => "Error de datos");
        }else{
        $strId = trim($_POST['Id']);
        $strNombre = ucwords(trim($_POST['Nombre']));
        $arrmateria = $objmateria->insertmateria($strId,$strNombre);
       }
       die();
    }

    if($option == "modificar"){
        if(empty($_POST['Id']) || empty($_POST['Nombre'])){
            $arrresponse = array('status' => false, 'data' => "Error de datos");
            }else{
            $strId = trim($_POST['Id']);
            $strNombre = ucwords(trim($_POST['Nombre']));
            $arrmateria = $objmateria->updatemateria($strId,$strNombre);
           }
        die();
    }

    if($option == "eliminar"){
        if($_POST){ 
            if(empty($_POST['Id'])){
                $arrresponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strId = trim($_POST['Id']);
                $arrmateria = $objmateria->delmateria($strId);
            }
            }
        die();        
    }

    die();

?>