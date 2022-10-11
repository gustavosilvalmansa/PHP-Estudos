/*CREATE DATABASE */
CREATE DATABASE `dbphp7` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*CREATE USER TABLE*/
CREATE TABLE `tb_usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `deslogin` varchar(64) NOT NULL,
  `dessenha` varchar(256) NOT NULL,
  `dtcadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


/*CREATE PROCEDURE sp_usuarios_insert*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios_insert`(
pdeslogin VARCHAR(64),
pdessenha VARCHAR(256)
)
BEGIN
	INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (pdeslogin,pdessenha);
    SELECT * FROM tb_usuarios where idusuario = last_insert_id();
END$$
DELIMITER ;