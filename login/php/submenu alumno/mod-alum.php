<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body>
  <h1>Modificar registro</h1>
    <form id="formmodalum">
    <label>Nro de Matricula a modificar</label>
        <input type="text" class="form-control" id="NroMat" name="NroMat" required/>
      <label>Nombre</label>
         <input type="text" class="form-control" id="Nombre" name="Nombre" required/>
      <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="Fecha" name="Fecha" class="center" required/>
      <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>Modificar</button>
      <a href="../sistema.php">Volver al menu</a>
    </form>
</body>
<script src="../../js/functions-alumno.js"></script>
</html>