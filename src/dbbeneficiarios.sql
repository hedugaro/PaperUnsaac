-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2020 às 04:18
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbbeneficiarios`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_eliminarAdministrador` (`pid` INT(11))  BEGIN
	if exists (select * from TAdministrador where idTAdministrador  = pid) then 
      delete from  TAdministrador
      where idTAdministrador = pid;
      select 0 as 'error', 'Registro eliminado!!!!' as 'mensaje';
  else
	  select 1 as 'error', 'El codigo hace referencia a otra tabla!!!!' as 'mensaje';	
  end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_insertarAdministrador` (`pnombreAdministrador` VARCHAR(50), `pusuario` VARCHAR(50), `pass` VARCHAR(50))  BEGIN
	insert  into TAdministrador (nombreAdministrador, usuario, password ) values (pnombreAdministrador, pusuario, pass);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listarAdministrador` ()  BEGIN
	SELECT *  FROM TAdministrador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_modificarAdministrador` (`pid` INT(11), `pnombreAdministrador` VARCHAR(50), `pusuario` VARCHAR(50), `pass` VARCHAR(50))  BEGIN
	 if exists (select * from TAdministrador where idTAdministrador = pid) then 
      update TAdministrador
      set	nombreAdministrador	= pnombreAdministrador, 
			usuario =pusuario,
			password	= pass
      where idTAdministrador= pid;
      select 0 as 'error', 'Registro Modificado!!!!' as 'mensaje';
  else
	  select 1 as 'error', 'Nombre Duplicado!!!!' as 'mensaje';	
  end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_recuperarUnAdministrador` (`pid` INT(11))  BEGIN
	SELECT *  FROM TAdministrador where idTAdministrador = pid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tadministrador`
--

CREATE TABLE `tadministrador` (
  `idTAdministrador` int(11) NOT NULL,
  `nombreAdministrador` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tadministrador`
--

INSERT INTO `tadministrador` (`idTAdministrador`, `nombreAdministrador`, `usuario`, `password`) VALUES
(4, 'Banco Central de Reserva del Perú', 'admin', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tagente`
--

CREATE TABLE `tagente` (
  `idTAgente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `idTAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbeneficiario`
--

CREATE TABLE `tbeneficiario` (
  `idTBeneficiario` int(11) NOT NULL,
  `nroDocumento` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `direccionEthereum` varchar(50) DEFAULT NULL,
  `idTAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tadministrador`
--
ALTER TABLE `tadministrador`
  ADD PRIMARY KEY (`idTAdministrador`);

--
-- Índices para tabela `tagente`
--
ALTER TABLE `tagente`
  ADD PRIMARY KEY (`idTAgente`),
  ADD KEY `idTAdmin` (`idTAdmin`);

--
-- Índices para tabela `tbeneficiario`
--
ALTER TABLE `tbeneficiario`
  ADD PRIMARY KEY (`idTBeneficiario`),
  ADD KEY `idTAdmin` (`idTAdmin`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tadministrador`
--
ALTER TABLE `tadministrador`
  MODIFY `idTAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tagente`
--
ALTER TABLE `tagente`
  MODIFY `idTAgente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbeneficiario`
--
ALTER TABLE `tbeneficiario`
  MODIFY `idTBeneficiario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tagente`
--
ALTER TABLE `tagente`
  ADD CONSTRAINT `tagente_ibfk_1` FOREIGN KEY (`idTAdmin`) REFERENCES `tadministrador` (`idTAdministrador`);

--
-- Limitadores para a tabela `tbeneficiario`
--
ALTER TABLE `tbeneficiario`
  ADD CONSTRAINT `tbeneficiario_ibfk_1` FOREIGN KEY (`idTAdmin`) REFERENCES `tadministrador` (`idTAdministrador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
