<?php
    require_once("C:xampp\htdocs\login\php\conexion.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../CSS/menustyle.css">
</head>
<body>
    <div id="menu">
            <nav>
                <ul class="menu-horizontal">
                    <li><a href=""> ALUMNO</a>
                        <ul class="menu-vertical">
                            <li><a href="submenu alumno/alta-alum.php">Alta</a></li>
                            <li><a href="submenu alumno/mod-alum.php">Modificar</a></li>
                            <li><a href="submenu alumno/eli-alum.php">Eliminar</a></li>
                            <li><a href="submenu alumno/mos-alum.php">Mostrar</a></li>
                        </ul>
                    </li>

                    <li><a href="">MATERIA</a>
                        <ul class="menu-vertical">
                            <li><a href="submenu materia/alta-mate.php">Alta</a></li>
                            <li><a href="submenu materia/mod-mate.php">Modificar</a></li>
                            <li><a href="submenu materia/eli-mate.php">Eliminar</a></li>
                            <li><a href="submenu materia/mos-mate.php">Mostrar</a></li>
                        </ul>
                    </li>

                    <li><a href="">VINCULAR</a>
                        <ul class="menu-vertical">
                            <li><a href="submenu vinculo/alta-vin.php">Alta</a></li>
                            <li><a href="submenu vinculo/mod-vin.php">Modificar</a></li>
                            <li><a href="submenu vinculo/eli-vin.php">Eliminar</a></li>
                            <li><a href="submenu vinculo/mos-vin.php">Mostrar</a></li>
                        </ul>
                    </li>
                    <li><a href="../login.html">SALIR</a></li>
                </ul>
            </nav>
    </div>
</body>
</html>