-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para biblion
CREATE DATABASE IF NOT EXISTS `biblion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `biblion`;

-- A despejar estrutura para tabela biblion.autores
CREATE TABLE IF NOT EXISTS `autores` (
  `ID_Autor` int NOT NULL AUTO_INCREMENT,
  `NomeAutor` varchar(100) NOT NULL,
  `Bibliografia` text,
  PRIMARY KEY (`ID_Autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.autores: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela biblion.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `ID_Categoria` int NOT NULL AUTO_INCREMENT,
  `NomeCategoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.categorias: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela biblion.editoras
CREATE TABLE IF NOT EXISTS `editoras` (
  `ID_Editora` int NOT NULL AUTO_INCREMENT,
  `NomeEditora` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID_Editora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.editoras: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela biblion.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `ID_Livro` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) NOT NULL,
  `Imagem` varchar(150) NOT NULL,
  `Descricao` text NOT NULL,
  `DataPublicacao` date NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `ID_Editora` int NOT NULL,
  PRIMARY KEY (`ID_Livro`),
  UNIQUE KEY `ISBN` (`ISBN`),
  KEY `ID_Editora` (`ID_Editora`),
  CONSTRAINT `ID_Editora` FOREIGN KEY (`ID_Editora`) REFERENCES `editoras` (`ID_Editora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.livros: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela biblion.livro_autor
CREATE TABLE IF NOT EXISTS `livro_autor` (
  `ID_Livro` int NOT NULL,
  `ID_Autor` int NOT NULL,
  KEY `ID_Autor` (`ID_Autor`),
  KEY `ID_LivroAut` (`ID_Livro`),
  CONSTRAINT `ID_Autor` FOREIGN KEY (`ID_Autor`) REFERENCES `autores` (`ID_Autor`),
  CONSTRAINT `ID_LivroAut` FOREIGN KEY (`ID_Livro`) REFERENCES `livros` (`ID_Livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.livro_autor: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela biblion.livro_categoria
CREATE TABLE IF NOT EXISTS `livro_categoria` (
  `ID_Livro` int NOT NULL,
  `ID_Categoria` int NOT NULL,
  KEY `ID_LivroCat` (`ID_Livro`),
  KEY `ID_Categoria` (`ID_Categoria`),
  CONSTRAINT `ID_Categoria` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`),
  CONSTRAINT `ID_LivroCat` FOREIGN KEY (`ID_Livro`) REFERENCES `livros` (`ID_Livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.livro_categoria: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela biblion.utilizadores
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `ID_Utilizador` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DataRegisto` datetime NOT NULL,
  PRIMARY KEY (`ID_Utilizador`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela biblion.utilizadores: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
