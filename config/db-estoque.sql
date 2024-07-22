CREATE DATABASE  IF NOT EXISTS `con-estoque` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `con-estoque`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: con-estoque
-- ------------------------------------------------------
-- Server version	8.0.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `Id` int NOT NULL AUTO_INCREMENT COMMENT 'Chave primária, auto-incremento\n',
  `NomeCategoria` varchar(45) NOT NULL COMMENT 'Nome da categoria\n',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_localizacao`
--

DROP TABLE IF EXISTS `tb_localizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_localizacao` (
  `Id` int NOT NULL AUTO_INCREMENT COMMENT 'Chave primária, auto-incremento\n',
  `NomeLocalizacao` varchar(45) NOT NULL COMMENT 'Nome da localização\n',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produtos` (
  `Id` int NOT NULL AUTO_INCREMENT COMMENT 'Chave primária, auto-incremento\n',
  `NomeProduto` varchar(45) NOT NULL COMMENT 'Nome do produto\n',
  `Quantidade` int NOT NULL COMMENT 'Quantidade do produto em estoque\n',
  `DisponivelParaSaida` int NOT NULL COMMENT 'Indicador se o produto está disponível para saída\n',
  `TB_CATEGORIA_Id` int NOT NULL COMMENT 'Chave estrangeira referenciando Categorias(ID)\n',
  `TB_LOCALIZACAO_Id` int NOT NULL COMMENT 'Chave estrangeira referenciando Localizacoes(ID)\n',
  PRIMARY KEY (`Id`),
  KEY `fk_TB_PRODUTOS_TB_CATEGORIA_idx` (`TB_CATEGORIA_Id`),
  KEY `fk_TB_PRODUTOS_TB_LOCALIZACAO1_idx` (`TB_LOCALIZACAO_Id`),
  CONSTRAINT `fk_TB_PRODUTOS_TB_CATEGORIA` FOREIGN KEY (`TB_CATEGORIA_Id`) REFERENCES `tb_categoria` (`Id`),
  CONSTRAINT `fk_TB_PRODUTOS_TB_LOCALIZACAO1` FOREIGN KEY (`TB_LOCALIZACAO_Id`) REFERENCES `tb_localizacao` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_saida`
--

DROP TABLE IF EXISTS `tb_saida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_saida` (
  `Id` int NOT NULL AUTO_INCREMENT COMMENT 'Chave primária, auto-incremento\n',
  `DataSaida` date NOT NULL COMMENT 'Data e hora da saída\n',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_saida-produto`
--

DROP TABLE IF EXISTS `tb_saida-produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_saida-produto` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `TB_SAIDA_Id` int NOT NULL,
  `TB_PRODUTOS_Id` int NOT NULL,
  `Quantidade` int NOT NULL COMMENT 'Quantidade do produto na saída\n',
  PRIMARY KEY (`Id`),
  KEY `fk_TB_SAIDA-PRODUTO_TB_SAIDA1_idx` (`TB_SAIDA_Id`),
  KEY `fk_TB_SAIDA-PRODUTO_TB_PRODUTOS1_idx` (`TB_PRODUTOS_Id`),
  CONSTRAINT `fk_TB_SAIDA-PRODUTO_TB_PRODUTOS1` FOREIGN KEY (`TB_PRODUTOS_Id`) REFERENCES `tb_produtos` (`Id`),
  CONSTRAINT `fk_TB_SAIDA-PRODUTO_TB_SAIDA1` FOREIGN KEY (`TB_SAIDA_Id`) REFERENCES `tb_saida` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_saida-usuario`
--

DROP TABLE IF EXISTS `tb_saida-usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_saida-usuario` (
  `Id` int NOT NULL AUTO_INCREMENT COMMENT 'Chave primária, auto-incremento\n',
  `TB_USUARIO_Id` int NOT NULL,
  `TB_SAIDA_Id` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_TB_SAIDA-USUARIO_TB_USUARIO1_idx` (`TB_USUARIO_Id`),
  KEY `fk_TB_SAIDA-USUARIO_TB_SAIDA1_idx` (`TB_SAIDA_Id`),
  CONSTRAINT `fk_TB_SAIDA-USUARIO_TB_SAIDA1` FOREIGN KEY (`TB_SAIDA_Id`) REFERENCES `tb_saida` (`Id`),
  CONSTRAINT `fk_TB_SAIDA-USUARIO_TB_USUARIO1` FOREIGN KEY (`TB_USUARIO_Id`) REFERENCES `tb_usuario` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `Id` int NOT NULL AUTO_INCREMENT COMMENT 'Chave primária, auto-incremento\n',
  `Nome` varchar(45) NOT NULL COMMENT 'Nome do usuário\n',
  `Email` varchar(45) NOT NULL COMMENT 'Email do usuário\n',
  `Senha` varchar(45) NOT NULL COMMENT 'Senha do usuário\n',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-21 11:07:30
