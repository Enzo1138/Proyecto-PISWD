CREATE DATABASE escuelatecnica6;
USE escuelatecnica6;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
CREATE TABLE usuario (
  Id INT CHECK(Id >= 1 AND Id <= 10),
  Nombre varchar(100) NOT NULL,
  Clave varchar(10) NOT NULL,
  PRIMARY KEY (Id)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE materia (
  Id INT CHECK(Id >= 1 AND Id <= 50),
  Nombre varchar(100) NOT NULL,
  PRIMARY KEY (Id)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--
CREATE TABLE alumno (
  NroMatricula INT CHECK(NroMatricula >= 1000 AND NroMatricula <= 9999),
  Nombre varchar(100) NOT NULL,
  Edad DATE,
  PRIMARY KEY (NroMatricula)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_alumno`
--
CREATE TABLE materia_alumno (
  Materia_Id int NOT NULL,
  Alumno_NroMatricula int NOT NULL,
  PRIMARY KEY (Materia_Id,Alumno_NroMatricula),
  FOREIGN KEY (Materia_Id) references materia(Id),
  FOREIGN KEY (Alumno_NroMatricula) references alumno(NroMatricula)
);
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Clave`) VALUES
(1, 'Enzortega_', '12345');
--
-- Procedures para la tabla `alumno`
--

DELIMITER $$
CREATE PROCEDURE `alta_alum` (in `NroMatriculaI` INT, in `NombreI` varchar(100), in `EdadI` date)
BEGIN
    DECLARE existe_alumno INT;
    DECLARE id INT;
    SET existe_alumno = (SELECT COUNT(*) FROM alumno WHERE NroMatricula = NroMatriculaI);
    IF existe_alumno = 0 THEN
      INSERT INTO alumno(NroMatricula,Nombre,Edad)
      VALUES (NroMatriculaI,NombreI,EdadI);
      SET id = NroMatriculaI;
    ELSE
      SET id = 0;
    END IF; 
    SELECT id;
END$$

DELIMITER $$
CREATE PROCEDURE `elim_alum` (in `NroMatriculaE` INT)
BEGIN
   DELETE FROM alumno WHERE NroMatricula = NroMatriculaE;
END$$

DELIMITER $$
CREATE PROCEDURE `mod_alum` (in `NroMatriculaM` INT, in `NombreM` varchar(100), in `EdadM` date)
BEGIN
    UPDATE alumno SET Nombre = NombreM, Edad = EdadM WHERE NroMatricula=NroMatriculaM;
END$$

DELIMITER $$
CREATE PROCEDURE `mos_alum`()
BEGIN
    SELECT NroMatricula,Nombre,Edad FROM alumno;
END$$

--
-- Procedures para la tabla `materia`
--

DELIMITER $$
CREATE PROCEDURE `alta_mate` (in `IdI` INT,in `NombreI` varchar(100))
BEGIN
    DECLARE existe_materia INT;
    DECLARE id INT;
    SET existe_materia = (SELECT COUNT(*) FROM materia WHERE Id = IdI);
    IF existe_materia = 0 THEN
      INSERT INTO materia (Id,Nombre)
      VALUES (IdI,NombreI);
      SET id = IdI;
    ELSE
      SET id = 0;
    END IF; 
    SELECT id;    
END$$

DELIMITER $$
CREATE PROCEDURE `elim_mate` (in `IdE` INT)
BEGIN
   DELETE FROM materia WHERE Id = IdE;
END$$

DELIMITER $$
CREATE PROCEDURE `mod_mate` (in `IdM` INT, in `NombreM` varchar(100))
BEGIN
    UPDATE materia SET Nombre=NombreM WHERE Id = IdM;
END$$

DELIMITER $$
CREATE PROCEDURE `mos_mate`()
BEGIN
    SELECT Id,Nombre FROM materia;
END$$

DELIMITER $$
--
-- Procedures para la tabla `materia_alumno`
--
DELIMITER $$
CREATE PROCEDURE `alta_alum_mate` (in `IdI` INT, in `NroMatriculaI`INT)
BEGIN
    DECLARE existe_nromatr INT;
    DECLARE existe_id INT;
    SET existe_nromatr = (SELECT COUNT(*) FROM alumno WHERE NroMatricula = NroMatriculaI);
    IF existe_nromatr = 1 THEN
    	SET existe_id = (SELECT COUNT(*) FROM materia WHERE Id = IdI);
        IF existe_id = 1 THEN
          INSERT INTO materia_alumno (Materia_Id, Alumno_NroMatricula)
          VALUES(IdI, NromatriculaI);
    	  END IF;
    END IF;      
END$$

DELIMITER $$
CREATE PROCEDURE `elim_alum_mate` (in `IdE` INT, in `NroMatriculaE`INT)
BEGIN
    DELETE FROM materia_alumno WHERE Materia_Id = IdE AND Alumno_NroMatricula = NroMatriculaE;
END$$

DELIMITER $$
CREATE PROCEDURE `mod_alum_mate` (in `IdE` INT, in `NroMatriculaE` INT, in `IdM` INT, in `NroMatriculaM`INT)
BEGIN
    DECLARE existe_nromatr INT;
    DECLARE existe_id INT;
    SET existe_nromatr = (SELECT COUNT(*) FROM materia_alumno WHERE Alumno_NroMatricula = NroMatriculaE);
    IF existe_nromatr > 0 THEN
    	SET existe_id = (SELECT COUNT(*) FROM materia_alumno WHERE Materia_Id = IdE);
        IF existe_id > 0 THEN
          UPDATE materia_alumno SET Materia_Id=IdM, Alumno_NroMatricula=NroMatriculaM;
        END IF;
    END IF;
END$$

DELIMITER $$
CREATE PROCEDURE `mos_alum_mate`()
BEGIN
    SELECT Materia_Id,Alumno_NroMatricula FROM materia_alumno;
END$$