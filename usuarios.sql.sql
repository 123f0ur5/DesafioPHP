CREATE DATABASE users;

USE users;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL UNIQUE,
  `imagem` varchar(60) NOT NULL,
  `data_registro` date NOT NULL,
  `quantidade_repositorio` smallint NOT NULL,
  PRIMARY KEY (`id`)
);
