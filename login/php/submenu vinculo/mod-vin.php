<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body>
  <h1>Modificar registro</h1>
    <form id="formmodvin">
      <label>Ingrese el Id de la Materia a Modificar</label>
        <input type="text" class="form-control" id="Id" name="Id" required/>
      <label>Ingrese la matricula del alumno a Modificar</label>
        <input type="text" class="form-control" id="NroMat" name="NroMat" required/>
      <label>Ingrese la modificacion del Id</label>  
        <input type="text" class="form-control" id="IdM" name="IdM" required/>
      <label>Ingrese la modificacion de la matricula </label>
        <input type="text" class="form-control" id="NroMatM" name="NroMatM" required/>
      <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>Modificar</button>
      <a href="../sistema.php">Volver al menu<a>
    </form>
</body>
<script src="../../js/functions-vinculos.js"></script>
</html>